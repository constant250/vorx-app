<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Http\Resources\ImageResource;
use Illuminate\Http\Request;
use App\Http\Requests\Organisation\CreateOrganisationBankDetailRequest;
use App\Http\Requests\Organisation\UpdateOrganisationBankDetailRequest;
use App\Http\Resources\OrganisationBankDetailResource;
use App\Models\Organisation;
use App\Models\OrganisationBankDetails;
use App\Models\Services\OrganisationBankDetailsService;
use Illuminate\Support\Facades\Route;
use App\Services\ResponseService;

class OrganisationBankDetailsController extends Controller
{
    public static function apiRoutes()
    {
        Route::post('organisations/{org}/bank-details', [OrganisationBankDetailsController::class, 'create']);
        Route::put('organisations/{org}/bank-details/{bank}', [OrganisationBankDetailsController::class, 'update']);
        Route::delete('organisations/{org}/bank-details/{bank}', [OrganisationBankDetailsController::class, 'delete']);
        Route::get('organisations/{org}/bank-details/{bank}', [OrganisationBankDetailsController::class, 'getSingle']);
        Route::get('/organisations/{org}/bank-details', [OrganisationBankDetailsController::class, 'getCollection']);
    }

    public function getCollection(Request $request)
    {
        
        $bank = OrganisationBankDetails::orderBy('id','desc')->paginate($request->input('per_page', 10));

        return OrganisationBankDetailResource::collection($bank);
    }

    public function getSingle(Organisation $org, OrganisationBankDetails $bank)
    {
        return new OrganisationBankDetailResource($bank);
    }

    public function create(Organisation $org, CreateOrganisationBankDetailRequest $request)
    {
        $validated = $request->validated();
        $bank = OrganisationBankDetailsService::create(
            $org->id,
            $validated['bank_name'],
            $validated['bsb'],
            $validated['account_name'],
            $validated['account_number'],
            $validated['branch_address'] ?? null,
            $validated['swift_code'] ?? null,
        );

        return ResponseService::successCreate('Bank Detail was created.', new OrganisationBankDetailResource($bank));
    }

    public function update(Organisation $org, OrganisationBankDetails $bank, UpdateOrganisationBankDetailRequest $request)
    {   

        $validated = $request->validated();
        $bank = $bank->Service()->update(          
            $validated['bank_name'],
            $validated['bsb'],
            $validated['account_name'],
            $validated['account_number'],
            $validated['branch_address'] ?? null,
            $validated['swift_code'] ?? null,
        );

        return ResponseService::successCreate('Bank Detail was updated.', new OrganisationBankDetailResource($bank));
    }

    public function delete(Organisation $org, OrganisationBankDetails $bank)
    {
        if(!$bank->Service()->delete()) {
            return ResponseService::serverError('Bank Detail was not deleted');
        }

        return ResponseService::success('Bank Detail was deleted.');

    }

}
