<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\ResponseService;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    use ApiResponser;

    public function register()
    {
        /**
         * TODO
         *   - validate request
         *   - create user
         *   - return token
         */
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return $this->error('Credentials not match', 401);
        }

        $token = auth()->user()->createToken('API Token')->plainTextToken;

        auth()->user()->api_token = $token;
        auth()->user()->save();

        // $request->authenticate();
        // $request->session()->regenerate();

        return $this->success([
            'token' => $token,
            'user' => new UserResource(auth()->user())
        ]);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        auth()->user()->api_token = null;
        auth()->user()->save();

        // $request->session()->invalidate();
        // $request->session()->regenerateToken();

        return $this->success([], 'Tokens Revoked');
    }

    public function authUser(Request $request)
    {
        return $request->user();
        // return $this->success([
        //     'success' => true,
        //     'token' => auth()->user()->api_token,
        //     'user' => new UserResource(auth()->user())
        // ]);
    }

    public function sampleRoute()
    {
        return 'sample';
    }
}
