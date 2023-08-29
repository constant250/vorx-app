<?php

namespace App\Models\Services;

use App\Models\CourseStructureFee;
use Illuminate\Support\Facades\Auth;

class CourseStructureFeeService extends ModelService
{
    /**
     * @var CourseStructureFee
     */
    private $courseStructureFee;

    public function __construct(CourseStructureFee $courseStructureFee)
    {
        $this->courseStructureFee = $courseStructureFee;
        $this->model = $courseStructureFee;
    }

    public static function create(
        Int $course_id,
        string $cricos_code = null,
        Int $state_id = null,
        Int $week_duration = 0,
        Int $training_hours_weekly = 0,
        Int $work_placement = 0,
        Int $onshore_material_fee = 0,
        Int $onshore_application_fee = 0,
        Int $onshore_tuition_fee = 0,
        Int $offshore_material_fee = 0,
        Int $offshore_application_fee = 0,
        Int $offshore_tuition_fee = 0,
    )
    {
        $courseStructureFee = new CourseStructureFee;
        $courseStructureFee->course_id = $course_id;
        $courseStructureFee->cricos_code = $cricos_code;
        $courseStructureFee->state_id = $state_id;
        $courseStructureFee->week_duration = $week_duration;
        $courseStructureFee->training_hours_weekly = $training_hours_weekly;
        $courseStructureFee->work_placement = $work_placement;
        $courseStructureFee->onshore_material_fee = $onshore_material_fee;
        $courseStructureFee->onshore_application_fee = $onshore_application_fee;
        $courseStructureFee->onshore_tuition_fee = $onshore_tuition_fee;
        $courseStructureFee->offshore_material_fee = $offshore_material_fee;
        $courseStructureFee->offshore_application_fee = $offshore_application_fee;
        $courseStructureFee->offshore_tuition_fee = $offshore_tuition_fee;
        $courseStructureFee->save();

        return $courseStructureFee;
    }

    public function update(
        string $cricos_code = null,
        Int $state_id = null,
        Int $week_duration = 0,
        Int $training_hours_weekly = 0,
        Int $work_placement = 0,
        Int $onshore_material_fee = 0,
        Int $onshore_application_fee = 0,
        Int $onshore_tuition_fee = 0,
        Int $offshore_material_fee = 0,
        Int $offshore_application_fee = 0,
        Int $offshore_tuition_fee = 0,
    )
    {
        $this->courseStructureFee->cricos_code = $cricos_code;
        $this->courseStructureFee->state_id = $state_id;
        $this->courseStructureFee->week_duration = $week_duration;
        $this->courseStructureFee->training_hours_weekly = $training_hours_weekly;
        $this->courseStructureFee->work_placement = $work_placement;
        $this->courseStructureFee->onshore_material_fee = $onshore_material_fee;
        $this->courseStructureFee->onshore_application_fee = $onshore_application_fee;
        $this->courseStructureFee->onshore_tuition_fee = $onshore_tuition_fee;
        $this->courseStructureFee->offshore_material_fee = $offshore_material_fee;
        $this->courseStructureFee->offshore_application_fee = $offshore_application_fee;
        $this->courseStructureFee->offshore_tuition_fee = $offshore_tuition_fee;
        $this->courseStructureFee->save();

        return $this->courseStructureFee->fresh();
    }


}