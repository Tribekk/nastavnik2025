<?php

namespace Domain\Consultant\Rules;

use Carbon\Carbon;
use Domain\Consultant\Models\ConsultantAppointmentInterval;
use Domain\Consultant\Models\ConsultantsAppointmentTimeInterval;
use Illuminate\Contracts\Validation\Rule;

class MatchFreeConsultantAppointmentInterval implements Rule
{
    protected $exceptId = null;
    protected $consultId;
    protected $dateAt;

    public function __construct($consultId, $dateAt, $exceptId = null)
    {
        $this->consultId = $consultId;
        $this->dateAt = $dateAt;
        $this->exceptId = $exceptId;
    }

    public function passes($attribute, $value)
    {
        $timeInterval = ConsultantsAppointmentTimeInterval::find($value);

        $lockedTimeIntervals = ConsultantsAppointmentTimeInterval::whereBetween('start_at', [
            (new Carbon($timeInterval->start_at))->addMinute(),
            (new Carbon($timeInterval->finish_at))->addMinute(),
        ])->orWhereBetween('finish_at', [
            (new Carbon($timeInterval->start_at))->addMinute(),
            (new Carbon($timeInterval->finish_at))->addMinute(),
        ])->get()->pluck('id')->toArray();


        $query = ConsultantAppointmentInterval::query()
            ->where('consultant_id', $this->consultId)
            ->where('date_at', $this->dateAt)
            ->whereIn('time_interval_id', $lockedTimeIntervals);

        if(!empty($this->exceptId)) {
            $query->where('id', '!=', $this->exceptId);
        }

        return !$query->first();
    }

    public function message()
    {
        return __('На данный промежуток и день уже есть запись или время записи пересекается с уже созданными слотами');
    }
}
