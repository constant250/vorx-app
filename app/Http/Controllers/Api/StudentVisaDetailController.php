<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StudentVisaDetailResource;
use App\Http\Requests\Student\CreateStudentVisaDetailRequest;
use App\Http\Requests\Student\UpdateStudentVisaDetailRequest;
use App\Models\Student;
use App\Models\StudentVisaDetail;
use App\Models\Services\StudentVisaDetailService;
use Illuminate\Support\Facades\Route;
use App\Services\ResponseService;
use App\Models\Enums\StudyRightsEnum;
use App\Models\Enums\AppliedForAuResidencyEnum;

class StudentVisaDetailController extends Controller
{
    public static function apiRoutes()
    {
        Route::post('students/{student}/visa-details/create', [StudentVisaDetailController::class, 'create']);
        Route::put('students/{student}/visa-details', [StudentVisaDetailController::class, 'update']);
        Route::get('students/{student}/visa-details', [StudentVisaDetailController::class, 'getSingle']);
    }

    public function create(Student $student, CreateStudentVisaDetailRequest $request){

        $validated = $request->validated();
        $visa_details = StudentVisaDetailService::create(
            $student->id,
            $validated['nationality'] ?? null,
            $validated['passport_no'] ?? null,
            $validated['passport_issued_date'] ?? null,
            $validated['passport_expiry_date'] ?? null,
            $validated['visa_type_id'] ?? null,
            $validated['subclass'] ?? null,
            $validated['visa_expiry_date'] ?? null,
            StudyRightsEnum::memberByValue($validated['study_rights']),
            AppliedForAuResidencyEnum::memberByValue($validated['applied_for_au_residency']),
        );

        return ResponseService::successCreate('Student Visa Detail was created.', new StudentVisaDetailResource($visa_details));
    }

    public function update(Student $student, UpdateStudentVisaDetailRequest $request)
    {
        $validated = $request->validated();
        $visa = $student->visa_details;
        $visa = $visa->Service()->update(
            $validated['nationality'] ?? null,
            $validated['passport_no'] ?? null,
            $validated['passport_issued_date'] ?? null,
            $validated['passport_expiry_date'] ?? null,
            $validated['visa_type_id'] ?? null,
            $validated['subclass'] ?? null,
            $validated['visa_expiry_date'] ?? null,
            StudyRightsEnum::memberByValue($validated['study_rights']),
            AppliedForAuResidencyEnum::memberByValue($validated['applied_for_au_residency']),
        );

        return ResponseService::successCreate('Student Visa Detail was updated.', new StudentVisaDetailResource($visa));
    }

    public function getSingle(Student $student)
    {
        $visa = $student->visa_details;
        return new StudentVisaDetailResource($visa);
    }
}
