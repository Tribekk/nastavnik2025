<?php /** @noinspection PhpUnused */

namespace Domain\User\Models;

use Carbon\Carbon;
use Domain\Admin\Models\School;
use Domain\Admin\Models\SchoolClass;
use Domain\Consultation\Models\Consultation;
use Domain\Event\Models\Event;
use Domain\Event\Models\EventParticipant;
use Domain\Feedback\Models\Feedback;
use Domain\Kladr\Models\Kladr;
use Domain\Orgunit\Models\ExternalOrgunit;
use Domain\Orgunit\Models\PersonalQuizBall;
use Domain\Quiz\Models\AvailableQuiz;
use Domain\Quiz\Models\CharacterTraitResult;
use Domain\Quiz\Models\FactorMotiveOfChoiceResult;
use Domain\Quiz\Models\InclinationResult;
use Domain\Quiz\Models\IntelligenceLevelResult;
use Domain\Quiz\Models\ParentQuestionnaireResult;
use Domain\Quiz\Models\ProfessionalTypeResult;
use Domain\Quiz\Models\SolutionCasesResult;
use Domain\Quiz\Models\StudentQuestionnaireResult;
use Domain\Quiz\Models\SuitableProfessionResult;
use Domain\Quiz\Models\TypeOfThinkingResult;
use Domain\Quiz\States\Quiz\FinishedQuizState;
use Domain\User\Actions\GetBestName;
use Domain\User\Actions\GetEmployerDashboardSettingsAction;
use Domain\User\Actions\GetFullName;
use Domain\User\Actions\GetName;
use Domain\User\Actions\GetNameFirstLetter;
use Domain\User\Actions\GetNotResultQuizzesAction;
use Domain\User\Actions\GetSex;
use Domain\User\Notifications\CustomResetPassword;
use Domain\User\Notifications\CustomVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Query\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;
use Swift_TransportException;
use Illuminate\Support\Facades\DB;


/**
 * @property integer id
 * @property hasMany availableQuizzes
 * @property bool isAdmin
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, HasPermissions, StudentQuizzes, ParentQuizzes;

    /**
     * Максимальная длина, после которой начинается сокращение имени.
     *
     * @see getBestNameAttribute
     * @var int
     */
    public static $MAX_NAME_LENGTH = 28;

    protected $guarded = [
        'id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'birth_date' => 'datetime',
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    /**
     * @var GetBestName
     */
    protected $bestNameAction;

    /**
     * @var GetName
     */
    protected $nameAction;

    /**
     * @var GetFullName
     */
    protected $fullNameAction;

    /**
     * @var GetNameFirstLetter
     */
    protected $nameFirstLetterAction;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->uuid = Str::uuid();
        $this->bestNameAction = app()->make('Domain\User\Actions\GetBestName');
        $this->nameAction = app()->make('Domain\User\Actions\GetName');
        $this->fullNameAction = app()->make('Domain\User\Actions\GetFullName');
        $this->nameFirstLetterAction = app()->make('Domain\User\Actions\GetNameFirstLetter');
    }

    /**
     * Является ли пользователь суперадминистратором
     *
     * @return bool
     */
    public function getIsAdminAttribute(): bool
    {
        return null !== $this->admin;
    }

    /**
     * Первая буква имени
     *
     * @return string
     */
    public function getNameFirstLetterAttribute(): string
    {
        return $this->nameFirstLetterAction->run($this);
    }

    /**
     * Имя в формате <Фамилия И.О.>
     *
     * @return string
     */
    public function getNameAttribute(): string
    {
        return $this->nameAction->run($this);
    }

    /**
     * Имя в формате <Фамилия Имя Отчество>
     *
     * @return string
     */
    public function getFullNameAttribute(): string
    {
        return $this->fullNameAction->run($this);
    }

    /**
     * Функция возвращает имя в наиболее подходящем формате. До длины $MAX_NAME_LENGTH возвращает полное имя, далее
     * возвращает сокращенное имя.
     *
     * @return string
     * @see $MAX_NAME_LENGTH
     */
    public function getBestNameAttribute(): string
    {
        return $this->bestNameAction->run($this);
    }

    /**
     * Пол в виде строки
     *
     * @param GetSex $action
     * @return string
     */
    public function getSexAsStringAttribute(GetSex $action): string
    {
        return $action->run($this);
    }

    /**
     * Форматированная дата рождения
     *
     * @return string
     */
    public function getBirthDateFormattedAttribute()
    {
        return $this->birth_date
            ? $this->birth_date->format('d.m.Y')
            : 'не указана';
    }

    /**
     * Кол-во полных лет
     *
     * @return int
     */
    public function getFullYearsAttribute(): int
    {
        return intval(now()->diffInMonths($this->birth_date) / 12);
    }

    public function getCanBeDeletedByAdminAttribute(): bool
    {
        if ($this->email === 'ano@proftreker.ru') {
            return false;
        }

        return true;
    }

    /**
     * Отформатированное кол-во полных лет
     *
     * @return string
     */
    public function getFullYearsFormattedAttribute(): string
    {
        $age = $this->fullYears;
        $word = num2word($age, ['год', 'года', 'лет']);

        return "{$age} {$word}";
    }

    /**
     * Печатная форма представления времени с момента создания пользователя
     *
     * @return string
     */
    public function getCreatedDiffForHumansAttribute(): string
    {
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->locale('ru')->diffForHumans();
    }

    /**
     * Состояние проверки email
     *
     * @return bool
     */
    public function getIsEmailVerifiedAttribute(): bool
    {
        return null !== $this->email_verified_at;
    }

    /**
     * У пользователя привязан тип
     *
     * @return bool
     */
    public function getHaveTypeAttribute(): bool
    {
        // TODO Roles
        return $this->hasAnyRole(['student', 'teacher', 'curator', 'parent', 'consultant', 'employer']);
    }

    /**
     * Пользователь является учащимся
     *
     * @return bool
     */
    public function getIsStudentAttribute(): bool
    {
        return $this->hasRole('student');
    }

    /**
     * Пользователь является преподавателем
     *
     * @return bool
     */
    public function getIsTeacherAttribute(): bool
    {
        return $this->hasRole('teacher');
    }

    /**
     * Пользователь является куратором
     *
     * @return bool
     */
    public function getIsCuratorAttribute(): bool
    {
        return $this->hasRole('curator');
    }

    /**
     * Пользователь является родителем/опекуном
     *
     * @return bool
     */
    public function getIsParentAttribute(): bool
    {
        return $this->hasRole('parent');
    }

    /**
     * Пользователь является работодателем
     *
     * @return bool
     */
    public function getIsEmployerAttribute(): bool
    {
        return $this->hasRole('employer');
    }

    /**
     * Пользователь является работодателем
     *
     * @return bool
     */
    public function getIsConsultantAttribute(): bool
    {
        return $this->hasRole('consultant');
    }

    /**
     * Список ролей пользователя одной строкой
     *
     * @return string
     */
    public function getRolesAsStringAttribute()
    {
        return $this->roles->count() > 0
            ? $this->roles->pluck('title')->implode(', ')
            : __('нет ролей');
    }

    /**
     * Новый API-токен пользователя
     */
    public function generateApiToken()
    {
        $this->api_token = Str::random(60);

        $this->save();
    }

    /**
     * URL-адрес на аватар пользователя
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        return $this->avatar
            ? Storage::disk('avatars')->url($this->avatar)
            : 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email)));
    }

    /**
     * Отношение "Пользователь-администратор"
     *
     * @return HasOne
     */
    public function admin()
    {
        return $this->hasOne(Admin::class, 'id');
    }

    /**
     * Доступные тесты
     *
     * @return HasMany
     */
    public function availableQuizzes()
    {
        return $this->hasMany(AvailableQuiz::class, 'user_id');
    }

    /**
     * Завершены ли все доступные тесты или нет
     *
     * @return bool
     */
    public function finishQuizzes(): bool
    {
        return AvailableQuiz::where('user_id', $this->id)
                ->where('state', '!=', FinishedQuizState::class)
                ->count() == 0;
    }

    /**
     * Кастомизация уведомления о сбросе пароля
     *
     * @param string $token
     */
    public function sendPasswordResetNotification($token)
    {
        try {
            $this->notify(new CustomResetPassword($token));
        } catch (\Exception $exception) {
            Log::error("Уведомление не отправлено. Текст ошибки: ". $exception->getMessage());
        }
    }

    /**
     * Кастомизация уведомления о верификации пароля
     */
    public function sendEmailVerificationNotification()
    {
        try {
            $this->notify(new CustomVerifyEmail());
        } catch (Swift_TransportException $e) {
            Log::info($e->getMessage());
        }
    }

    /**
     * Поля для учителей
     *
     * @return MorphOne
     */
    public function employee(): MorphOne
    {
        return $this->morphOne(Employee::class, 'employeeable');
    }

    /**
     * Поля для учеников
     *
     * @return HasOne
     */
    public function student(): HasOne
    {
        return $this->hasOne(Student::class, 'user_id');
    }


    /**
     * Поля для консультантов
     *
     * @return HasOne
     */
    public function consultant(): HasOne
    {
        return $this->hasOne(Consultant::class, 'user_id');
    }

    /**
     * Школа
     *
     * @return BelongsTo
     */
    public function school(): BelongsTo
    {
        return $this->belongsTo(School::class, 'school_id');
    }

    /**
     * Класс
     *
     * @return BelongsTo
     */
    public function class(): BelongsTo
    {
        return $this->belongsTo(SchoolClass::class, 'class_id');
    }

    public function classes($checkRoles = true)
    {
        $query = SchoolClass::query();

        if(Auth::user()->hasRole('teacher') && !Auth::user()->isAdmin) {
            $query->whereHas('curators', function($q) {
                $q->where('curator_id', Auth::id());
            });
        }

        $query->where('school_id', $this->school_id);

        return $query;
    }

    /**
     * Кладр
     *
     * @return BelongsTo
     */
    public function kladr(): BelongsTo
    {
        return $this->belongsTo(Kladr::class, 'kladr_code', 'code');
    }

    /**
     * Список наблюдаемых пользователей
     * @return HasMany
     */
    public function observedUsers()
    {
        return $this->hasMany(ObservedPeople::class, "user_id");
    }

    /**
     * Список наблюдателей
     * @return HasMany
     */
    public function observers()
    {
        return $this->hasMany(ObservedPeople::class, "observed_user_id");
    }

    /**
     * Обратная связь
     *
     * @return BelongsTo
     */
    public function feedback(): BelongsTo
    {
        return $this->belongsTo(Feedback::class, 'id', 'user_id');
    }

    /**
     * Обратная связь. Эмоции
     *
     * @return HasMany
     */
    public function emotionsFeedback(): HasMany
    {
        return $this->hasMany(User::class, "id", "user_id");
    }

    /**
     * Вывод только студентов
     *
     * @param $query
     * @return Builder $query
     */
    public function scopeStudents($query)
    {
        return $query->whereHas('roles', function ($q) {
            $q->where('name', 'student');
        });
    }


    /**
     * Консультации
     * @return HasMany
     */
    public function consultations()
    {
        if($this->isParent) {
            return $this->hasMany(Consultation::class,'parent_id');
        } else if($this->isStudent) {
            return $this->hasMany(Consultation::class,'child_id');
        }

        return $this->hasMany(Consultation::class,'consultant_id');
    }

    /**
     * Возвращает список тестов у которых нет результатов
     * @return array
     */
    public function notResultQuizzes(): array
    {
        $action = new GetNotResultQuizzesAction();
        return $action->run($this);
    }

    public function orgunit()
    {
        return $this->belongsTo(ExternalOrgunit::class, "orgunit_id");
    }

    public function getPersonalQuizBall()
    {
        $ball = PersonalQuizBall::where('user_id',$this->id)->first();
        if(!$ball) return 0;
        return $ball->ball;
    }

    public function settings()
    {
        return $this->hasMany(UserSetting::class, "user_id");
    }

    public function getEmployerDashboardSettingsAttribute()
    {
        $action = new GetEmployerDashboardSettingsAction();
        return $action->run($this);
    }

    public function getCityAttribute()
    {
        $city = Kladr::where('code', $this->kladr_code)->orWhere('name', $this->kladr_code)->first();
        return empty($city) ? 'не указан' : $city->name;
    }

    public function events()
    {
        return $this->hasMany(EventParticipant::class, "user_id");
    }

    public function getEventsFormats()
    {
        $user_formats = DB::table('events')
            ->join('event_participants', 'events.id', '=', 'event_participants.event_id')
            ->join('event_formats', 'events.format_id', '=', 'event_formats.id')
            ->where('event_participants.user_id', '=', $this->id)
            ->select('event_formats.title')
            ->pluck('title')->toArray();

        $str_user_formats = implode(', ', $user_formats);

        return $str_user_formats;
    }

    public function getStringProfessionalTypesResults()
    {
        $user_professional_types = DB::table('professional_type_result_values')
            ->join('professional_type_results', 'professional_type_result_values.result_id', '=', 'professional_type_results.id')
            ->join('professional_types', 'professional_type_result_values.type_id', '=', 'professional_types.id')
            ->where('professional_type_results.user_id', '=', $this->id)
            ->where('professional_type_result_values.value',  '>=', 2)
            ->select('professional_types.area')
            ->orderBy('professional_type_result_values.value', 'desc')
            ->pluck('area')->toArray();

        $str_user_professional_types = implode(', ', $user_professional_types);

        return $str_user_professional_types;
    }

    public function orgunitEvents()
    {
        return $this->hasMany(Event::class, "orgunit_id", 'orgunit_id');
    }

    public function getStageTestsAndConsultations()
    {
        return $this->belongsTo(StageTestsAndConsultations::class, "id", "user_id");
    }

}
