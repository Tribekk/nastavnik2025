<?php /** @noinspection PhpUnused */

namespace Domain\User\Models;

use Domain\Admin\Models\School;
use Domain\Admin\Models\SchoolClass;
use Domain\Consultation\Models\Consultation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Support\CastAttributes\SerializationString;

class StageTestsAndConsultations extends Model
{
    use SoftDeletes;

    protected $table = "stages_tests_and_consultations";

    protected $guarded = ['id'];

    protected $casts = [
        'school' => SerializationString::class,
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function parent()
    {
        return $this->belongsTo(User::class, "parent_id");
    }

    public function consultation()
    {
        return $this->belongsTo(Consultation::class, "child_id");
    }

    public function school()
    {
        return $this->belongsTo(School::class, "school_id");
    }

    public function class()
    {
        return $this->belongsTo(SchoolClass::class, "class_id");
    }

    public function getBaseStepSelectionLabelAttribute(): string
    {
        if($this->base_step_selection == 'matched') return 'Соответсвует базовому портрету';
        if($this->base_step_selection == 'partially_matched') return 'Частично соответствует базовому портрету';
        return 'Не соответствует базовому портрету';
    }

    public function getBaseStepSelectionColorClassAttribute(): string
    {
        if($this->base_step_selection == 'matched') return 'text-success';
        if($this->base_step_selection == 'partially_matched') return 'font-orange';
        return 'text-primary';
    }

    public function getDepthStepSelectionLabelAttribute(): string
    {
        if($this->depth_step_selection == 'target') return 'Целевой';
        if($this->depth_step_selection == 'partially_target') return 'Частично целевой';
        return 'Не целевой';
    }

    public function getDepthStepSelectionColorClassAttribute(): string
    {
        if($this->depth_step_selection == 'target') return 'text-success';
        if($this->depth_step_selection == 'partially_target') return 'font-orange';
        return 'text-primary';
    }
}
