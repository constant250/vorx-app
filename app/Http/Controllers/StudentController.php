<?php

namespace App\Http\Controllers;

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
use Inertia\Inertia;

class StudentController extends Controller
{
    public static function webRoutes()
    {
        Route::get('student/create', [StudentController::class, 'create'])->name('student.create');
        Route::get('student', [StudentController::class, 'index'])->name('student.index');
        Route::get('student/{student}', [StudentController::class, 'edit'])->name('student.edit');
        Route::put('student/{student}', [StudentController::class, 'update'])->name('student.update');
        Route::delete('student/{student}', [StudentController::class, 'delete'])->name('student.delete');
        Route::post('student', [StudentController::class, 'store'])->name('student.store');
    }

    public function index()
    {
        return Inertia::render('Student', [
            'students' => Student::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('StudentForm', [
            'student' => null
        ]);
    }

    public function store(CreateStudentRequest $request)
    {
        $student = StudentService::create(
            $request->validated()['student_id'],
            $request->validated()['firstname'],
            $request->validated()['middlename'],
            $request->validated()['lastname'],
            $request->validated()['date_of_birth'],
            $request->validated()['gender'],
            StudentShoreTypeEnum::memberByValue($request->validated()['shore_type']),
            StudentStatusEnum::memberByValue($request->validated()['is_active']),
            StudentTestEnum::memberByValue($request->validated()['is_test'])
        );

        return redirect()->route('student.index')
        ->with('message', 'Student created successfully!')
        ->with('status', 'success');
    }

    public function edit(Student $student)
    {
        return Inertia::render('StudentForm', [
            'Student' => $student
        ]);
    }

    public function update(Student $student, UpdateStudentRequest $request)
    {
        $student = $student->Service()->update(
            $request->validated()['student_id'],
            $request->validated()['firstname'],
            $request->validated()['middlename'] ?? null,
            $request->validated()['lastname'],
            $request->validated()['date_of_birth'],
            $request->validated()['gender'] ?? 'Male',
            StudentShoreTypeEnum::memberByValue($request->validated()['shore_type']),
            StudentStatusEnum::memberByValue($request->validated()['is_active']),
            StudentTestEnum::memberByValue($request->validated()['is_test'])
        );

        return redirect()->route('student.index')
        ->with('message', 'Student updated successfully!')
        ->with('status', 'success');
    }

    public function delete(Student $student)
    {
        if($student->Service()->delete()) {
            return redirect()->route('student.index')
            ->with('message', 'Student deleted successfully!')
            ->with('status', 'success');
        }

        return redirect()->route('student.index')
            ->with('message', 'Student was not deleted.')
            ->with('status', 'error');

    }
}
