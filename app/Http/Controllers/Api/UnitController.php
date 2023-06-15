<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ImageRequest;
use App\Http\Resources\ImageResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Services\ResponseService;
use App\Http\Requests\Unit\CreateUnitRequest;
use App\Http\Requests\Unit\UpdateUnitRequest;
use App\Models\Services\UnitService;
use App\Http\Resources\UnitResource;
use App\Models\Enums\UnitStatusEnum;
use App\Models\Enums\UnitTypeEnum;
use App\Models\Enums\UnitVetFlagEnum;
use App\Models\Unit;

class UnitController extends Controller
{
    public static function apiRoutes()
    {
        // file upload routes
        Route::post('units/{unit}/upload', [UnitController::class, 'uploadImage']);
        Route::delete('units/{unit}/{file_id}', [UnitController::class, 'deleteImage']);

        Route::post('units', [UnitController::class, 'create']);
        Route::put('units/{unit}', [UnitController::class, 'update']);
        Route::delete('units/{unit}', [UnitController::class, 'delete']);
        Route::get('units/{unit}', [UnitController::class, 'getSingle']);
        Route::get('/units', [UnitController::class, 'getCollection']);
    }

    public function create(CreateUnitRequest $request)
    {
        $unit = UnitService::create(
            $request->validated()['code'],
            UnitTypeEnum::memberByValue($request->validated()['unit_type']),
            $request->validated()['assessment_method'] ?? null,
            $request->validated()['description'],
            $request->validated()['nominal_hours'] ?? 0,
            $request->validated()['scheduled_hours'] ?? 0,
            $request->validated()['training_method_id'],
            $request->validated()['subject_field_educ_id'],
            UnitVetFlagEnum::memberByValue($request->validated()['vet_flag']),
            UnitStatusEnum::memberByValue($request->validated()['status']),
            
        );

        return ResponseService::successCreate('Unit was created.', new UnitResource($unit));
    }

    public function update(Unit $unit, UpdateUnitRequest $request)
    {
        $unit = $unit->Service()->update(
            $request->validated()['code'],
            UnitTypeEnum::memberByValue($request->validated()['unit_type']),
            $request->validated()['assessment_method'],
            $request->validated()['description'],
            $request->validated()['nominal_hours'] ?? 0,
            $request->validated()['scheduled_hours'] ?? 0,
            $request->validated()['training_method_id'],
            $request->validated()['subject_field_educ_id'],
            UnitVetFlagEnum::memberByValue($request->validated()['vet_flag']),
            UnitStatusEnum::memberByValue($request->validated()['status']),
            
        );

        return ResponseService::successCreate('Unit was updated.', new UnitResource($unit));
    }

    public function getCollection(Request $request)
    {
        $unit = Unit::orderBy('id','desc')->paginate($request->input('per_page', 10));

        return UnitResource::collection($unit);
    }

    public function getSingle(Unit $unit)
    {
        return new UnitResource($unit);
    }

    public function delete(Unit $unit)
    {
        if(!$unit->Service()->delete()) {
            return ResponseService::serverError('Unit was not deleted');
        }

        return ResponseService::success('Unit was deleted.');

    }

    public function uploadImage(ImageRequest $request, Unit $unit)
    {
        $images = $unit->Service()->uploadImages($request->files);

        return ResponseService::success('Unit file was uploaded.', ImageResource::collection($images));
    }

    public function deleteImage(Unit $unit, int $file_id)
    {
        $unit->Service()->detachImage($file_id);

        return ResponseService::success('Unit file was deleted.');
    }

}
