<?php

namespace App\Models\Services;

use App\Models\CourseStructureFee;
use App\Models\StudentContactDetail;
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

    public static function create()
    {
        
    }

    public function update()
    {
        
    }

}