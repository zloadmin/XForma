<?php

namespace App\Http\Requests\UserAnswer;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserAnswer extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function bodyParameters(): array
    {
        return [
            'spend_time' => ['description' => 'Время в секундах потраченное на ответ', 'example' => 100]
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
            'spend_time' => ['required', 'numeric', 'min:1', 'max:' . 60 * 60 * 24 * 365]
        ];
    }
}
