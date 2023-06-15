<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Http\Resources\ImageResource;
use Illuminate\Http\Request;
use App\Http\Requests\Organisation\CreateOrganisationRequest;
use App\Http\Requests\Organisation\UpdateOrganisationRequest;
use App\Http\Resources\OrganisationResource;
use App\Models\Organisation;
use App\Models\Enums\OrganisationStatusEnum;
use App\Models\Services\OrganisationService;
use Illuminate\Support\Facades\Route;
use App\Services\ResponseService;

class OrganisationController extends Controller
{
    public static function apiRoutes()
    {
        // file upload routes
        Route::post('organisations/{org}/upload-image', [OrganisationController::class, 'uploadImage']);
        Route::delete('organisations/{org}/{type}/{file_id}', [OrganisationController::class, 'deleteImage']);

        Route::post('organisations', [OrganisationController::class, 'create']);
        Route::put('organisations/{org}', [OrganisationController::class, 'update']);
        Route::delete('organisations/{org}', [OrganisationController::class, 'delete']);
        Route::get('organisations/{org}', [OrganisationController::class, 'getSingle']);
        Route::get('/organisations', [OrganisationController::class, 'getCollection']);
    }

    public function getCollection(Request $request)
    {
        
        $organisation = Organisation::orderBy('id','desc')->paginate($request->input('per_page', 10));

        return OrganisationResource::collection($organisation);
    }

    public function getSingle(Organisation $org)
    {
        return new OrganisationResource($org);
    }

    public function create(CreateOrganisationRequest $request)
    {
        $validated = $request->validated();
        $organisation = OrganisationService::create(
            $validated['organisation_id'] ?? null,
            $validated['organisation_name'] ?? null,
            $validated['organisation_logo'] ?? null,
            $validated['org_type_identifier'] ?? null,
            $validated['abn'] ?? null,
            $validated['cricos_code'] ?? null,
            $validated['site_url'] ?? null,
            $validated['contact_name'] ?? null,
            $validated['phone_number'] ?? null,
            $validated['fax_number'] ?? null,
            $validated['email'] ?? null,
            $validated['addr_line_1'] ?? null,
            $validated['addr_line_2'] ?? null,
            $validated['suburb'] ?? null,
            $validated['student_id_prefix'] ?? null,
            $validated['person_in_charge_name'] ?? null,
            $validated['person_in_charge_position'] ?? null,
            $validated['person_in_charge_signature'] ?? null,
            OrganisationStatusEnum::memberByValue($validated['status']),
        );

        return ResponseService::successCreate('Organisation was created.', new OrganisationResource($organisation));
    }

    public function update(Organisation $org, UpdateOrganisationRequest $request)
    {   
        $validated = $request->validated();
        $organisation = $org->Service()->update(
            $validated['organisation_id'] ?? null,
            $validated['organisation_name'] ?? null,
            $validated['organisation_logo'] ?? null,
            $validated['org_type_identifier'] ?? null,
            $validated['abn'] ?? null,
            $validated['cricos_code'] ?? null,
            $validated['site_url'] ?? null,
            $validated['contact_name'] ?? null,
            $validated['phone_number'] ?? null,
            $validated['fax_number'] ?? null,
            $validated['email'] ?? null,
            $validated['addr_line_1'] ?? null,
            $validated['addr_line_2'] ?? null,
            $validated['suburb'] ?? null,
            $validated['student_id_prefix'] ?? null,
            $validated['person_in_charge_name'] ?? null,
            $validated['person_in_charge_position'] ?? null,
            $validated['person_in_charge_signature'] ?? null,
            OrganisationStatusEnum::memberByValue($validated['status']),
        );

        return ResponseService::successCreate('Organisation was updated.', new OrganisationResource($organisation));
    }

    public function delete(Organisation $org)
    {
        if(!$org->Service()->delete()) {
            return ResponseService::serverError('Organisation was not deleted');
        }

        return ResponseService::success('Organisation was deleted.');

    }

    public function uploadImage(ImageRequest $request, Organisation $org)
    {
        $images = $org->Service()->uploadImages($request->type, $request->files);

        return ResponseService::success('Image file was uploaded.', new ImageResource($images));
    }

    public function deleteImage(Organisation $org, string $type, int $file_id)
    {
        $org->Service()->detachImage($file_id);

        if ($type == 'logo') {
            if($org->image->name == $org->organisation_logo){
                $org->organisation_logo = null;
            }
        } else {
            if($org->image->name == $org->person_in_charge_signature){
                $org->person_in_charge_signature = null;
            }
        }
        $org->update();

        return ResponseService::success('Image file was deleted.');
    }
}
