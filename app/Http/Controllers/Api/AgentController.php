<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Http\Resources\ImageResource;
use Illuminate\Http\Request;
use App\Http\Requests\Agent\CreateAgentRequest;
use App\Http\Requests\Agent\UpdateAgentRequest;
use App\Http\Resources\AgentResource;
use App\Models\Agent;
use App\Models\Enums\AgentShoreTypeEnum;
use App\Models\Enums\AgentStatusEnum;
use App\Models\Enums\AgentTestEnum;
use App\Models\Services\AgentService;
use Illuminate\Support\Facades\Route;
use App\Services\ResponseService;

class AgentController extends Controller
{
    public static function apiRoutes()
    {
        // file upload routes
        Route::post('agents/{agent}/upload', [AgentController::class, 'uploadImage']);
        Route::delete('agents/{agent}/{file_id}', [AgentController::class, 'deleteImage']);


        Route::post('agents', [AgentController::class, 'create']);
        Route::put('agents/{agent}', [AgentController::class, 'update']);
        Route::delete('agents/{agent}', [AgentController::class, 'delete']);
        Route::get('agents/{agent}', [AgentController::class, 'getSingle']);
        Route::get('/agents', [AgentController::class, 'getCollection']);
    }

    public function create(CreateAgentRequest $request)
    {
        $validated = $request->validated();
        $agent = AgentService::create(
            $this->generate_agent_code(),
            $validated['company_name'],
            $validated['trading_name'],
            $validated['agent_name'],
            $validated['abn'] ?? null,
            $validated['address'] ?? null,
            $validated['email'],
            $validated['alt_email'] ?? null,
            $validated['phone'],
            $validated['mobile'] ?? null,
            $validated['fax'] ?? null,
            $validated['website'] ?? null,
            $validated['remarks'] ?? null,
            $validated['bank_name'] ?? null,
            $validated['account_name'] ?? null,
            $validated['bsb'] ?? null,
            $validated['account_number'] ?? null,
            AgentShoreTypeEnum::memberByValue($validated['shore_type']),
            AgentStatusEnum::memberByValue($validated['is_active']),
            AgentTestEnum::memberByValue($validated['is_test'])
        );

        if(isset($agent['error'])) {
            return ResponseService::clientError($agent['message'], $request->all());
        }

        return ResponseService::successCreate('Agent was created.', new AgentResource($agent));
    }

    public function update(Agent $agent, UpdateAgentRequest $request)
    {
        $validated = $request->validated();
        $agent = $agent->Service()->update(
            $validated['company_name'],
            $validated['trading_name'],
            $validated['agent_name'],
            $validated['abn'] ?? null,
            $validated['address'] ?? null,
            $validated['email'],
            $validated['alt_email'] ?? null,
            $validated['phone'],
            $validated['mobile'] ?? null,
            $validated['fax'] ?? null,
            $validated['website'] ?? null,
            $validated['remarks'] ?? null,
            $validated['bank_name'] ?? null,
            $validated['account_name'] ?? null,
            $validated['bsb'] ?? null,
            $validated['account_number'] ?? null,
            AgentShoreTypeEnum::memberByValue($validated['shore_type']),
            AgentStatusEnum::memberByValue($validated['is_active']),
            AgentTestEnum::memberByValue($validated['is_test'])
        );

        return ResponseService::successCreate('Agent was updated.', new AgentResource($agent));
    }

    public function getCollection(Request $request)
    {
        $agent = Agent::orderBy('id','desc')->paginate($request->input('per_page', 10));

        return AgentResource::collection($agent);
    }

    public function getSingle(Agent $agent)
    {
        return new AgentResource($agent);
    }

    public function delete(Agent $agent)
    {
        if(!$agent->Service()->delete()) {
            return ResponseService::serverError('Agent was not deleted');
        }

        return ResponseService::success('Agent was deleted.');

    }

    public function uploadImage(ImageRequest $request, Agent $agent)
    {
        $images = $agent->Service()->uploadImages($request->files);

        return ResponseService::success('Agent file was uploaded.', ImageResource::collection($images));
    }

    public function deleteImage(Agent $agent, int $file_id)
    {
        $agent->Service()->detachImage($file_id);

        return ResponseService::success('Agent file was deleted.');
    }

    public function generate_agent_code($input = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ', $strength = 10)
    {
        $input_length = strlen($input);
        $random_string = '';

        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        $validate = Agent::where('agent_code', $random_string)->first();

        if ($validate) {
            $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $this->generate_agent_code($permitted_chars, 10);
        } else {
            return $random_string;
        }
    }
}
