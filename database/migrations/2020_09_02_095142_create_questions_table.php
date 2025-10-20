<?php
/** @noinspection PhpUndefinedMethodInspection */

use Carbon\Carbon;
use Domain\Quiz\Models\QuestionType;
use Domain\Quiz\Models\Quiz;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('quiz_id');
            $table->text('content');
            $table->morphs('questionable');
            $table->timestamps();
        });

        $type = QuestionType::where('code', 'yns')->firstOrFail();
        $quiz = Quiz::where('slug', 'traits')->firstOrFAil();

        DB::table('questions')->insert(
            array(
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Для меня лучший отдых - пообщаться в веселой компании.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я иногда чувствую себя очень веселым или печальным даже без серьезной причины.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Меня очень интересует все новое, что появляется вокруг.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я всегда осуществляю то, что запланировал.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Когда я с кем-то в ссоре, то обычно сам делаю первый шаг, чтобы помириться.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я часто нуждаюсь в друзьях, которые могли бы меня поддержать и утешить.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'У меня легко меняется настроение.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Прошлый опыт для меня имеет ценность, я его учитываю, он меня учит.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я умею рассчитывать свое время так, что успеваю сделать все нужное.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Меня можно назвать очень добрым человеком.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я очень люблю ходить в гости.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Иногда я волнуюсь так сильно, что не могу усидеть на месте.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Меня можно назвать любопытным, интересующимся человеком.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Думаю, что окружающие считают меня очень ответственным человеком.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я человек доверчивый.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Меня часто тянет к приключениям, я люблю «встряхнуться».',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Однообразие мне быстро надоедает, вызывает скуку.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'У меня широкий круг интересов, разнообразные увлечения.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я аккуратен и осмотрителен в словах и в делах.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я охотно откликаюсь на самые разнообразные просьбы друзей и знакомых.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Большинство знаний я получаю из общения со сверстниками, а не из книг или школьных уроков.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Бывает, я чувствую себя очень уставшим без всякой причины.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я легко ориентируюсь в неожиданных ситуациях.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Если мои желания вступают в противоречие с потребностями, то я всегда выбираю не то, что хочу, а то, что должен делать.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Думаю, что окружающие не считают меня эгоистом.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я человек разговорчивый.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Считаю, что характеристика «спокойный» - ко мне не подходит.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Думаю, что большинство окружающих считают, что я человек творческий, с богатым воображением.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Полагаю, что назвать ленивым меня нельзя.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я избегаю соперничества с другими людьми.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Мне нравятся большие шумные компании.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Меня часто одолевают сомнения по самым разным поводам.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я люблю размышлять над причинами и последствиями происходящих в моей жизни событий.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Когда я поставил перед собой цель, то готов преодолеть большие трудности на пути к ней.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Думаю, что я человек щедрый.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'У меня лучше получается работать в обществе других людей, а не в одиночестве.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Меня легко развеселить или расстроить.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Мне нравится узнавать все новое - даже когда это идет вразрез с моими знаниями и убеждениями.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Прежде чем сделать что-либо, я всегда задумываюсь о возможных последствиях.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Мне доставляет удовольствие помогать другим людям.',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\CharacterTrait',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            )
        );

        DB::table('questions')
            ->whereIn('id', [1, 6, 11, 16, 21, 26, 31, 36])
            ->update(['questionable_id' => 1]);

        DB::table('questions')
            ->whereIn('id', [2, 7, 12, 17, 22, 27, 32, 37])
            ->update(['questionable_id' => 2]);

        DB::table('questions')
            ->whereIn('id', [3, 8, 13, 18, 23, 28, 33, 38])
            ->update(['questionable_id' => 3]);

        DB::table('questions')
            ->whereIn('id', [4, 9, 14, 19, 24, 29, 34, 39])
            ->update(['questionable_id' => 4]);

        DB::table('questions')
            ->whereIn('id', [5, 10, 15, 20, 25, 30, 35, 40])
            ->update(['questionable_id' => 5]);

        $type = QuestionType::where('code', 'circle')->firstOrFail();
        $quiz = Quiz::where('slug', 'interests')->firstOrFAil();

        DB::table('questions')->insert(
            array(
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Мне интересны',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\ProfessionalType',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я разбираюсь',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\ProfessionalType',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я с удовольствием занимаюсь',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\ProfessionalType',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Стремлюсь',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\ProfessionalType',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я умею',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\ProfessionalType',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Выберу для поступления',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\ProfessionalType',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я люблю',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\ProfessionalType',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Для меня важно',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\ProfessionalType',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Меня увлекает',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\ProfessionalType',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Изучаю',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\ProfessionalType',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'uuid' => Str::uuid(),
                    'type_id' => $type->id,
                    'quiz_id' => $quiz->id,
                    'content' => 'Я могу',
                    'questionable_id' => 1,
                    'questionable_type' => 'Domain\Quiz\Models\ProfessionalType',
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            )
        );
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
