<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StudentAvetmissDetailResource;
use App\Http\Requests\Student\CreateStudentAvetmissDetailRequest;
use App\Http\Requests\Student\UpdateStudentAvetmissDetailRequest;
use App\Models\Student;
use App\Models\StudentAvetmissDetail;
use App\Models\Services\StudentAvetmissDetailService;
use Illuminate\Support\Facades\Route;
use App\Services\ResponseService;
use App\Models\Enums\AtSchoolFlagEnum;
use App\Models\Enums\DisabilityFlagEnum;
use App\Models\Enums\PriorEducationalAchievementFlagEnum;

class StudentAvetmissDetailController extends Controller
{
    public static function apiRoutes()
    {
        Route::post('students/{student}/avetmiss-details/create', [StudentAvetmissDetailController::class, 'create']);
        Route::put('students/{student}/avetmiss-details', [StudentAvetmissDetailController::class, 'update']);
        Route::get('students/{student}/avetmiss-details', [StudentAvetmissDetailController::class, 'getSingle']);
    }

    public function create(Student $student, CreateStudentAvetmissDetailRequest $request){

        $validated = $request->validated();
        $avetmiss_details = StudentAvetmissDetailService::create(
            $student->id,
            $validated['usi'] ?? null,
            $validated['highest_school_level_completed_id'] ?? null,
            $validated['indigenous_status_id'] ?? null,
            $validated['language_id'] ?? null,
            $validated['labour_force_status_id'] ?? null,
            $validated['country_id'] ?? null,
            DisabilityFlagEnum::memberByValue($validated['disability_flag']) ?? 'N',
            $validated['disability'] ?? null,
            PriorEducationalAchievementFlagEnum::memberByValue($validated['prior_educational_achievment_flag']) ?? 'N',
            $validated['prior_educational_achievment'] ?? null,
            AtSchoolFlagEnum::memberByValue($validated['at_school_flag']) ?? 'N',
            $validated['institute'] ?? null,
            $validated['city_of_birth'] ?? null,
            $validated['survey_contact_status'] ?? null,
            $validated['statistical_area_level_1_id'] ?? null,
            $validated['statistical_area_level_2_id'] ?? null,
            $validated['year_completed'] ?? null,
            $validated['aiss_check_date'] ?? null,
            $validated['english_test_id'] ?? null,
            $validated['english_test_score'] ?? null,
            $validated['english_test_date'] ?? null,
        );

        return ResponseService::successCreate('Student Avetmiss Detail was created.', new StudentAvetmissDetailResource($avetmiss_details));
    }

    public function update(Student $student, UpdateStudentAvetmissDetailRequest $request)
    {
        $validated = $request->validated();
        $avetmiss = $student->avetmiss_details;
        $avetmiss = $avetmiss->Service()->update(
            $validated['usi'] ?? null,
            $validated['highest_school_level_completed_id'] ?? null,
            $validated['indigenous_status_id'] ?? null,
            $validated['language_id'] ?? null,
            $validated['labour_force_status_id'] ?? null,
            $validated['country_id'] ?? null,
            DisabilityFlagEnum::memberByValue($validated['disability_flag']) ?? 'N',
            $validated['disability'] ?? null,
            PriorEducationalAchievementFlagEnum::memberByValue($validated['prior_educational_achievment_flag']) ?? 'N',
            $validated['prior_educational_achievment'] ?? null,
            AtSchoolFlagEnum::memberByValue($validated['at_school_flag']) ?? 'N',
            $validated['institute'] ?? null,
            $validated['city_of_birth'] ?? null,
            $validated['survey_contact_status'] ?? null,
            $validated['statistical_area_level_1_id'] ?? null,
            $validated['statistical_area_level_2_id'] ?? null,
            $validated['year_completed'] ?? null,
            $validated['aiss_check_date'] ?? null,
            $validated['english_test_id'] ?? null,
            $validated['english_test_score'] ?? null,
            $validated['english_test_date'] ?? null,
        );

        return ResponseService::successCreate('Student Avetmiss Detail was updated.', new StudentAvetmissDetailResource($avetmiss));
    }

    public function getSingle(Student $student)
    {
        $avetmiss = $student->avetmiss_details;
        return new StudentAvetmissDetailResource($avetmiss);
    }
}
