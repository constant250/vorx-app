<?php

namespace App\Models\Services;

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use App\Models\Enums\StudentShoreTypeEnum;
use App\Models\Enums\StudentStatusEnum;
use App\Models\Enums\StudentTestEnum;
use App\Traits\ImageModelServiceTrait;

class StudentService extends ModelService
{
    use ImageModelServiceTrait;
    
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
        $result = static::checkStudent($firstname,$lastname,$date_of_birth,$gender);

        if ($result == false) {
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
        }else{
            return ['error' => true, 'message' => 'Student already exist'];
        }
    }
   
    public function update(
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
        $this->student->student_id = $student_id;
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

    public static function checkStudent($firstname,$lastname,$date_of_birth,$gender)
    {

        $result = false;

        $student = Student::where('firstname', 'LIKE', '%' . $firstname . '%')->where('lastname', 'LIKE', '%' . $lastname . '%')->where('date_of_birth', 'LIKE', '%' . $date_of_birth . '%')->where('gender', $gender)->first();

        if ($student != null) {
            $result = true;
        }

        return $result;
    }

    public function uploadImages(object $images)
    {
        foreach ($images as $image) {
            $filename = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . '_' . time();
            $file = $this->student->FileServiceFactory()->uploadFile($image, $filename);

            $this->student->Service()->attachImage($image, $file['name']);
        }

        return $this->student->fresh()->images;
    }
}
