<?php

namespace App\Http\Requests\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class SignInUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Fields descriptions
     *
     * @return array[]
     */
    public function bodyParameters(): array
    {
        return [
            'username' => ['description' => 'Логин', 'example' => 'admin'],
            'password' => ['description' => 'Пароль', 'example' => 'password'],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'username' => ['required', 'string', 'max:' . User::USERNAME_MAX],
            'password' => ['required'],
        ];
    }
}
