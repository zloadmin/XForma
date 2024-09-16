<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\ApiController;


use App\Http\Requests\Auth\SignInUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\ActiveUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


/**
 * @group Авторизация
 */
class AuthController extends ApiController
{
    /**
     * Вход в систему
     *
     * @response status=400 scenario="Credential Mismatch" {"status":"error","message":"Credential Mismatch"}
     * @response status=400 scenario="User Inactive" {"status":"error","message":"User inactive"}
     * @response status=429 scenario="Validation Errors"
     * @apiResource App\Http\Resources\User\UserResource
     * @apiResourceModel App\Models\User
     * @apiResourceAdditional accessToken="2|6XJgxX0hXMLErQx34CoaKpEkV6YvN5JKC5Yi8cBTe38d4ec6"
     */
    public function login(SignInUserRequest $request)
    {

        $user = User::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if (!$user->is_active) {
                return $this->respondBadRequest('User inactive');
            }
            $accessToken = $user->createToken('login');
            return (new UserResource($user))->additional([
                'accessToken' => $accessToken->plainTextToken
            ]);
        }
        return $this->respondCredentialMismatch();
    }

    /**
     * Профиль
     *
     * @authenticated
     * @response status=400 scenario="Credential Mismatch" {"status":"error","message":"Credential Mismatch"}
     * @apiResource App\Http\Resources\User\UserResource
     * @apiResourceModel App\Models\User
     */
    public function info()
    {
        $user = auth()->user();
        return new UserResource($user);
    }
}
