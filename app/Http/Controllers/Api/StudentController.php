<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StudentResource;
use App\Http\Requests\Student\CreateStudentRequest;
use App\Http\Requests\Student\UpdateStudentRequest;
use App\Models\Student;
use App\Models\Enums\StudentShoreTypeEnum;
use App\Models\Enums\StudentStatusEnum;
use App\Models\Enums\StudentTestEnum;
use App\Models\Services\StudentService;
use Illuminate\Support\Facades\Route;
use App\Services\ResponseService;

class StudentController extends Controller
{
    public static function apiRoutes()
    {
        Route::post('students/create', [StudentController::class, 'create']);
        Route::put('students/{student}', [StudentController::class, 'update']);
        Route::delete('students/{student}', [StudentController::class, 'delete']);
        Route::get('students/{student}', [StudentController::class, 'getSingle']);
        Route::get('/students', [StudentController::class, 'getCollection']);
    }

    public function create(CreateStudentRequest $request)
    {
        $student = StudentService::create(
            $this->generate_student_id(),
            $request->validated()['firstname'],
            $request->validated()['middlename'] ?? null,
            $request->validated()['lastname'],
            $request->validated()['date_of_birth'],
            $request->validated()['gender'] ?? 'Male',
            StudentShoreTypeEnum::memberByValue($request->validated()['shore_type']),
            StudentStatusEnum::memberByValue($request->validated()['is_active']),
            StudentTestEnum::memberByValue($request->validated()['is_test'])
        );

        return ResponseService::successCreate('Student was created.', new StudentResource($student));
    }

    public function update(Student $student, UpdateStudentRequest $request)
    {
        $student = $student->Service()->update(
            $request->validated()['firstname'],
            $request->validated()['middlename'] ?? null,
            $request->validated()['lastname'],
            $request->validated()['date_of_birth'],
            $request->validated()['gender'] ?? 'Male',
            StudentShoreTypeEnum::memberByValue($request->validated()['shore_type']),
            StudentStatusEnum::memberByValue($request->validated()['is_active']),
            StudentTestEnum::memberByValue($request->validated()['is_test'])
        );

        return ResponseService::successCreate('Student was updated.', new StudentResource($student));
    }

    public function getCollection(Request $request)
    {
        $student = Student::orderBy('id','desc')->paginate($request->input('per_page', 10));

        return StudentResource::collection($student);
    }

    public function getSingle(Student $student)
    {
        return new StudentResource($student);
    }

    public function delete(Student $student)
    {
        if(!$student->Service()->delete()) {
            return ResponseService::serverError('Student was not deleted');
        }

        return ResponseService::success('Student was deleted.');

    }

    public function generate_student_id($student_id = null, $start = false)
    {
        $prefix = 'VRX';

        if($student_id == null){
            $student = Student::where('student_id', '!=', null)->latest()->first();
            $student_id = $student ? $student->student_id : $prefix . str_pad(0 , 5, 0, STR_PAD_LEFT);
        }
        $next_id = abs(str_replace($prefix,"",$student_id));
        $next_id++;

        if(env('START_STUDENT_ID') && !$start) {
            $next_id = (int) env('START_STUDENT_ID');
            $student = $prefix.$next_id++;
        }
        
        if(env('START_STUDENT_ID') && $start) {
            $next_id = $prefix . $next_id;
        } else {
            if($prefix == 'CEA') {
                // random numbers
                $next_id = $prefix . str_pad(rand(1900,3000) , 5, 0, STR_PAD_LEFT);
            }
            else {
                $next_id = $prefix . str_pad($next_id , 5, 0, STR_PAD_LEFT);
            }
        }
        $check = Student::where('student_id', $next_id)->withTrashed()->first();
        
        if($check){
            if(env('START_STUDENT_ID')) {
                return $this->generate_student_id($next_id, true);
            }
            return $this->generate_student_id($next_id);
        }

        return $next_id;
    }
}
