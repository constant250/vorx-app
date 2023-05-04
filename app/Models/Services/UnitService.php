<?php

namespace App\Models\Services;

use App\Models\Unit;
use Illuminate\Support\Facades\Auth;
use App\Models\Enums\UnitStatusEnum;
use App\Models\Enums\UnitTypeEnum;
use App\Models\Enums\UnitVetFlagEnum;

class UnitService extends ModelService
{
    /**
     * @var Unit
     */
    private $unit;

    public function __construct(Unit $unit)
    {
        $this->unit = $unit;
        $this->model = $unit;
    }

    public static function create(
        string $code,
        UnitTypeEnum $unit_type,
        string $assessment_method = null,
        string $description = null,
        int $nominal_hours = 0,
        int $scheduled_hours = 0,
        int $training_method_id = null,
        int $subject_field_educ_id = null,
        UnitVetFlagEnum $vet_flag,
        UnitStatusEnum $status
    )
    {
        $unit = new Unit;
        $unit->code = $code;
        $unit->unit_type = $unit_type;
        $unit->assessment_method = $assessment_method;
        $unit->description = $description;
        $unit->nominal_hours = $nominal_hours;
        $unit->scheduled_hours = $scheduled_hours;
        $unit->training_method_id = $training_method_id;
        $unit->subject_field_educ_id = $subject_field_educ_id;
        $unit->vet_flag = $vet_flag;
        $unit->status = $status;
        $unit->user_id = Auth::user()->id;
        $unit->account_id = Auth::user()->account_id;
        $unit->save();

        return $unit;
    }

    public function update(
        string $code,
        UnitTypeEnum $unit_type,
        string $assessment_method,
        string $description = null,
        int $nominal_hours = 0,
        int $scheduled_hours = 0,
        int $training_method_id = null,
        int $subject_field_educ_id = null,
        UnitVetFlagEnum $vet_flag,
        UnitStatusEnum $status
    )
    {
        $this->unit->code = $code;
        $this->unit->unit_type = $unit_type;
        $this->unit->assessment_method = $assessment_method;
        $this->unit->description = $description;
        $this->unit->nominal_hours = $nominal_hours;
        $this->unit->scheduled_hours = $scheduled_hours;
        $this->unit->training_method_id = $training_method_id;
        $this->unit->subject_field_educ_id = $subject_field_educ_id;
        $this->unit->vet_flag = $vet_flag;
        $this->unit->status = $status;
        $this->unit->save();

        return $this->unit->fresh();
    }
   
}
