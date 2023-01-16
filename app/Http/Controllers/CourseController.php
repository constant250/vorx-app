<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use App\Models\Enums\CourseStatusEnum;
use App\Models\Services\CourseService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Services\ResponseService;
use Inertia\Inertia;

class CourseController extends Controller
{
    public static function webRoutes()
    {
        Route::get('course/create', [CourseController::class, 'create'])->name('course.create');
        Route::get('course', [CourseController::class, 'index'])->name('course.index');
        Route::get('course/{course}', [CourseController::class, 'edit'])->name('course.edit');
        Route::put('course/{course}', [CourseController::class, 'update'])->name('course.update');
        Route::delete('course/{course}', [CourseController::class, 'delete'])->name('course.delete');
        Route::post('course', [CourseController::class, 'store'])->name('course.store');
    }

    public function index()
    {
        return Inertia::render('Course', [
            'courses' => Course::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('CourseForm', [
            'course' => null
        ]);
    }

    public function store(CreateCourseRequest $request)
    {
        $course = CourseService::create(
            $request->validated()['name'],
            $request->validated()['code'],
            $request->validated()['target_enrolee'],
            $request->validated()['tp_code'] ?? null,
            CourseStatusEnum::memberByValue($request->validated()['status'])
        );

        return redirect()->route('course.index')
        ->with('message', 'Course created successfully!')
        ->with('status', 'success');
    }

    public function edit(Course $course)
    {
        return Inertia::render('CourseForm', [
            'course' => $course
        ]);
    }

    public function update(Course $course, UpdateCourseRequest $request)
    {
        $course = $course->Service()->update(
            $request->validated()['name'],
            $request->validated()['code'],
            $request->validated()['target_enrolee'],
            $request->validated()['tp_code'] ?? null,
            CourseStatusEnum::memberByValue($request->validated()['status'])
        );

        return redirect()->route('course.index')
        ->with('message', 'Course updated successfully!')
        ->with('status', 'success');
    }

    public function delete(Course $course)
    {
        if($course->Service()->delete()) {
            return redirect()->route('course.index')
            ->with('message', 'Course deleted successfully!')
            ->with('status', 'success');
        }

        return redirect()->route('course.index')
            ->with('message', 'Course was not deleted.')
            ->with('status', 'error');

    }
}
