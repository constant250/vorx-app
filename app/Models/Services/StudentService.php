<?php

namespace App\Models\Services;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\Enums\StudentShoreTypeEnum;
use App\Models\Enums\StudentStatusEnum;
use App\Models\Enums\StudentTestEnum;

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

    public static function create(
        string $student_id,
        string $firstname,
        string $middlename = null,
        string $lastname,
        string $date_of_birth,
        string $gender,
        StudentShoreTypeEnum $shore_type,
        StudentStatusEnum $is_active,
        StudentTestEnum $is_test
    )
    {
        $student = new Student;
        $student->student_id = $student_id;
        $student->firstname = $firstname;
        $student->middlename = $middlename;
        $student->lastname = $lastname;
        $student->gender = $gender;
        $student->date_of_birth = $date_of_birth;
        $student->shore_type = $shore_type;
        $student->is_active = $is_active;
        $student->is_test = $is_test;
        $student->user_id = Auth::user()->id;
        $student->account_id = Auth::user()->account_id;
        $student->save();

        return $student;
    }
   
    public function update(
        string $firstname,
        string $middlename = null,
        string $lastname,
        string $date_of_birth,
        string $gender,
        StudentShoreTypeEnum $shore_type,
        StudentStatusEnum $is_active,
        StudentTestEnum $is_test
    )
    {
        $this->student->firstname = $firstname;
        $this->student->middlename = $middlename;
        $this->student->lastname = $lastname;
        $this->student->gender = $gender;
        $this->student->date_of_birth = $date_of_birth;
        $this->student->shore_type = $shore_type;
        $this->student->is_active = $is_active;
        $this->student->is_test = $is_test;
        $this->student->save();

        return $this->student->fresh();
    }
}
