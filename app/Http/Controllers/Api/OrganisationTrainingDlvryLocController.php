<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Organisation\CreateOrganisationTrainingDlvryLocRequest;
use App\Http\Requests\Organisation\UpdateOrganisationTrainingDlvryLocRequest;
use App\Http\Resources\OrganisationTrainingDlvryLocResource;
use App\Models\Organisation;
use App\Models\OrganisationDeliveryLocation;
use App\Models\Enums\OrganisationDlvrLocStatusEnum;
use App\Models\Services\OrganisationDeliveryLocationService;
use Illuminate\Support\Facades\Route;
use App\Services\ResponseService;

class OrganisationTrainingDlvryLocController extends Controller
{
    public static function apiRoutes()
    {
        Route::post('organisations/{org}/delivery-location', [OrganisationTrainingDlvryLocController::class, 'create']);
        Route::put('organisations/{org}/delivery-location/{location}', [OrganisationTrainingDlvryLocController::class, 'update']);
        Route::delete('organisations/{org}/delivery-location/{location}', [OrganisationTrainingDlvryLocController::class, 'delete']);
        Route::get('organisations/{org}/delivery-location/{location}', [OrganisationTrainingDlvryLocController::class, 'getSingle']);
        Route::get('/organisations/{org}/delivery-location', [OrganisationTrainingDlvryLocController::class, 'getCollection']);
    }

    public function getCollection(Request $request)
    {
        
        $location = OrganisationDeliveryLocation::orderBy('id','desc')->paginate($request->input('per_page', 10));

        return OrganisationTrainingDlvryLocResource::collection($location);
    }

    public function getSingle(Organisation $org, OrganisationDeliveryLocation $location)
    {
        return new OrganisationTrainingDlvryLocResource($location);
    }

    public function create(Organisation $org, CreateOrganisationTrainingDlvryLocRequest $request)
    {
        $validated = $request->validated();
        $location = OrganisationDeliveryLocationService::create(
            $org->id,
            $validated['train_org_dlvr_loc_id'],
            $validated['train_org_dlvr_loc_name'],
            $validated['state_id'],
            $validated['country_id'],
            $validated['suburb'],
            $validated['postcode'],
            $validated['addr_location'] ?? null,
            $validated['addr_street_num'] ?? null,
            $validated['addr_street_name'] ?? null,
            $validated['addr_building_property_name'] ?? null,
            $validated['addr_flat_unit_detail'] ?? null,
            OrganisationDlvrLocStatusEnum::memberByValue($validated['is_active']),
        );

        return ResponseService::successCreate('Training Delivery Location was created.', new OrganisationTrainingDlvryLocResource($location));
    }

    public function update(Organisation $org, OrganisationDeliveryLocation $location, UpdateOrganisationTrainingDlvryLocRequest $request)
    {   

        $validated = $request->validated();
        $location = $location->Service()->update(          
            $validated['train_org_dlvr_loc_id'],
            $validated['train_org_dlvr_loc_name'],
            $validated['state_id'],
            $validated['country_id'],
            $validated['suburb'],
            $validated['postcode'],
            $validated['addr_location'] ?? null,
            $validated['addr_street_num'] ?? null,
            $validated['addr_street_name'] ?? null,
            $validated['addr_building_property_name'] ?? null,
            $validated['addr_flat_unit_detail'] ?? null,
            OrganisationDlvrLocStatusEnum::memberByValue($validated['is_active']),
        );

        return ResponseService::successCreate('Training Delivery Location was updated.', new OrganisationTrainingDlvryLocResource($location));
    }

    public function delete(Organisation $org, OrganisationDeliveryLocation $location)
    {
        if(!$location->Service()->delete()) {
            return ResponseService::serverError('Training Delivery Location was not deleted');
        }

        return ResponseService::success('Training Delivery Location was deleted.');

    }
}
