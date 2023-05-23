<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ImageRequest;
use App\Http\Resources\ImageResource;
use App\Http\Requests\CreateCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Http\Resources\CourseResource;
use App\Models\Course;
use App\Models\Enums\CourseStatusEnum;
use App\Models\Services\CourseService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ResponseService;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public static function apiRoutes()
    {
        // file upload routes
        Route::post('courses/{course}/upload', [CourseController::class, 'uploadImage']);
        Route::delete('courses/{course}/{file_id}', [CourseController::class, 'deleteImage']);

        Route::post('courses/{course}/assign-units', [CourseController::class, 'assignUnits']);
        Route::post('courses', [CourseController::class, 'create']);
        Route::put('courses/{course}', [CourseController::class, 'update']);
        Route::delete('courses/{course}', [CourseController::class, 'delete']);
        Route::get('courses/{course}', [CourseController::class, 'getSingle']);
        Route::get('courses', [CourseController::class, 'getCollection']);
    }

    public function getCollection(Request $request)
    {
        
        $course = Course::orderBy('id','desc')->paginate($request->input('per_page', 10));

        return CourseResource::collection($course);
    }

    public function getSingle(Course $course)
    {
        return new CourseResource($course);
    }

    public function create(CreateCourseRequest $request)
    {
        $course = CourseService::create(
            $request->validated()['name'],
            $request->validated()['code'],
            $request->validated()['target_enrolee'],
            $request->validated()['tp_code'] ?? null,
            CourseStatusEnum::memberByValue($request->validated()['status'])
        );

        return ResponseService::successCreate('Course was created.', new CourseResource($course));
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

        return ResponseService::successCreate('Course was updated.', new CourseResource($course));
    }

    public function delete(Course $course)
    {
        if(!$course->Service()->delete()) {
            return ResponseService::serverError('Course was not deleted');
        }

        return ResponseService::success('Course was deleted.');

    }

    public function assignUnits(Course $course, Request $request)
    {
        $course = $course->Service()->assignUnits($request->units);
        
        return ResponseService::success('Units was added to the course.',  new CourseResource($course));
    }

    public function uploadImage(ImageRequest $request, Course $course)
    {
        $images = $course->Service()->uploadImages($request->files);

        return ResponseService::success('Course file was uploaded.', ImageResource::collection($images));
    }

    public function deleteImage(Course $course, int $file_id)
    {
        $course->Service()->detachImage($file_id);

        return ResponseService::success('Course file was deleted.');
    }

}
