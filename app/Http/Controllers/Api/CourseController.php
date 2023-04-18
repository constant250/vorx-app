<?php

namespace App\Http\Controllers\Api;

// use App\Http\Resources\ImageResource;
use App\Http\Requests\CreateCourseRequest;
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
        Route::get('courses/get-collection', [CourseController::class, 'getCollection']);
        Route::post('courses', [CourseController::class, 'create']);
    }

    public function getCollection(Request $request)
    {
        $course = Course::paginate($request->input('per_page', 10));

        return CourseResource::collection($course);
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
    } 

}
