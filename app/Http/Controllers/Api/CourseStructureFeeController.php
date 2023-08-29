<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Http\Requests\Course\CreateCourseStructureFeeRequest;
use App\Http\Requests\Course\UpdateCourseStructureFeeRequest;
use Illuminate\Support\Facades\Route;
use App\Services\ResponseService;
use App\Models\CourseStructureFee;
use App\Models\Services\CourseStructureFeeService;
use App\Http\Resources\CourseStructureFeeResource;

class CourseStructureFeeController extends Controller
{
    public static function apiRoutes()
    {
        Route::post('courses/{course}/structure-fees', [CourseStructureFeeController::class, 'create']);
        Route::put('courses/{course}/structure-fees/{structure}', [CourseStructureFeeController::class, 'update']);
        Route::get('courses/{course}/structure-fees/{structure}', [CourseStructureFeeController::class, 'getSingle']);
        Route::delete('courses/{course}/structure-fees/{structure}', [CourseStructureFeeController::class, 'delete']);
        Route::get('courses/{course}/structure-fees', [CourseStructureFeeController::class, 'getCollection']);
    }

    public function create(Course $course, CreateCourseStructureFeeRequest $request){

        $validated = $request->validated();
        $avetmiss_details = CourseStructureFeeService::create(
            $course->id,
            $validated['cricos_code'] ?? null,
            $validated['state_id'] ?? null,
            $validated['week_duration'] ?? 0,
            $validated['training_hours_weekly'] ?? 0,
            $validated['work_placement'] ?? 0,
            $validated['onshore_material_fee'] ?? 0,
            $validated['onshore_application_fee'] ?? 0,
            $validated['onshore_tuition_fee'] ?? 0,
            $validated['offshore_material_fee'] ?? 0,
            $validated['offshore_application_fee'] ?? 0,
            $validated['offshore_tuition_fee'] ?? 0,
        );

        return ResponseService::successCreate('Structure Fee was created.', new CourseStructureFeeResource($avetmiss_details));
    }

    public function update(Course $course, CourseStructureFee $structure, UpdateCourseStructureFeeRequest $request)
    {
        
        $validated = $request->validated();
        $structure = $structure->Service()->update(
            $validated['cricos_code'] ?? null,
            $validated['state_id'] ?? null,
            $validated['week_duration'] ?? 0,
            $validated['training_hours_weekly'] ?? 0,
            $validated['work_placement'] ?? 0,
            $validated['onshore_material_fee'] ?? 0,
            $validated['onshore_application_fee'] ?? 0,
            $validated['onshore_tuition_fee'] ?? 0,
            $validated['offshore_material_fee'] ?? 0,
            $validated['offshore_application_fee'] ?? 0,
            $validated['offshore_tuition_fee'] ?? 0,
        );

        return ResponseService::successCreate('Structure Fee was updated.', new CourseStructureFeeResource($structure));
    }

    public function getSingle(Course $course, CourseStructureFee $structure)
    {
        return new CourseStructureFeeResource($structure);
    }

    public function getCollection(Request $request)
    {
        $structure = CourseStructureFee::orderBy('id','desc')->paginate($request->input('per_page', 10));

        return CourseStructureFeeResource::collection($structure);
    }


    public function delete(Course $course, CourseStructureFee $structure)
    {
        if(!$structure->Service()->delete()) {
            return ResponseService::serverError('Structure Fee was not deleted');
        }

        return ResponseService::success('Structure Fee was deleted.');

    }
}
