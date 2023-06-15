<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\StudentContactDetailResource;
use App\Http\Requests\Student\CreateStudentContactDetailRequest;
use App\Http\Requests\Student\UpdateStudentContactDetailRequest;
use App\Models\Student;
use App\Models\StudentContactDetail;
use App\Models\Services\StudentContactDetailService;
use Illuminate\Support\Facades\Route;
use App\Services\ResponseService;

class StudentContactDetailController extends Controller
{
    public static function apiRoutes()
    {
        Route::post('students/{student}/contact-details', [StudentContactDetailController::class, 'create']);
        Route::put('students/{student}/contact-details', [StudentContactDetailController::class, 'update']);
        Route::get('students/{student}/contact-details', [StudentContactDetailController::class, 'getSingle']);
    }

    public function create(Student $student, CreateStudentContactDetailRequest $request){

        $validated = $request->validated();
        $contact_details = StudentContactDetailService::create(
            $student->id,
            $validated['addr_suburb'] ?? null,
            $validated['addr_flat_unit_detail'] ?? null,
            $validated['addr_building_property_name'] ?? null,
            $validated['addr_street_name'] ?? null,
            $validated['addr_street_num'] ?? null,
            $validated['postcode'] ?? null,
            $validated['state'] ?? null,
            $validated['addr_postal_delivery_box'] ?? null,
            $validated['home_country_res_addr'] ?? null,
            $validated['phone_home'] ?? null,
            $validated['phone_work'] ?? null,
            $validated['phone_mobile'] ?? null,
            $validated['email'] ?? null,
            $validated['email_alt'] ?? null,
            $validated['emer_name'] ?? null,
            $validated['emer_address'] ?? null,
            $validated['emer_phone'] ?? null,
            $validated['emer_relationship'] ?? null,
        );

        return ResponseService::successCreate('Student Contact Detail was created.', new StudentContactDetailResource($contact_details));
    }

    public function update(Student $student, UpdateStudentContactDetailRequest $request)
    {
        $validated = $request->validated();
        $contact = $student->contact_details;
        $contact = $contact->Service()->update(
            $validated['addr_suburb'] ?? null,
            $validated['addr_flat_unit_detail'] ?? null,
            $validated['addr_building_property_name'] ?? null,
            $validated['addr_street_name'] ?? null,
            $validated['addr_street_num'] ?? null,
            $validated['postcode'] ?? null,
            $validated['state'] ?? null,
            $validated['addr_postal_delivery_box'] ?? null,
            $validated['home_country_res_addr'] ?? null,
            $validated['phone_home'] ?? null,
            $validated['phone_work'] ?? null,
            $validated['phone_mobile'] ?? null,
            $validated['email'] ?? null,
            $validated['email_alt'] ?? null,
            $validated['emer_name'] ?? null,
            $validated['emer_address'] ?? null,
            $validated['emer_phone'] ?? null,
            $validated['emer_relationship'] ?? null
        );

        return ResponseService::successCreate('Student Contact Detail was updated.', new StudentContactDetailResource($contact));
    }

    public function getSingle(Student $student)
    {
        $contact = $student->contact_details;
        return new StudentContactDetailResource($contact);
    }
}