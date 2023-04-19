<?php

namespace App\Models\Services;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class StudentService extends ModelService
{
    /**
     * @var Student
     */
    private $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
        $this->model = $student;
    }

   
}
