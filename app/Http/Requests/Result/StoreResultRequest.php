<?php

namespace App\Http\Requests\Result;

use App\Enums\User\UserEducationMode;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreResultRequest extends FormRequest
{


    /**
     * Fields descriptions
     *
     * @return array[]
     */
    public function bodyParameters(): array
    {
        return [
            'ticket_id'                 => ['description' => 'Номер билета', 'example' => 1],
            'education_mode'            => ['description' => 'Режим', 'example' => UserEducationMode::random()],
            'is_success'                => ['description' => 'Результат сдал/не сдал', 'example' => rand(0, 1)],
            'tasks'                     => ['description' => 'Задачи'],
            'tasks.*.id'                => ['description' => 'Номер задания', 'example' => 1],
            'tasks.*.point_accuracy'    => ['description' => 'Бал за точность', 'example' => 3],
            'tasks.*.point_consistency' => ['description' => 'Бал за последовательнось', 'example' => 5],
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
            'ticket_id'                 => ['required', 'integer', 'exists:tickets,id'],
            'education_mode'            => ['required', Rule::in(UserEducationMode::values())],
            'is_success'                => ['required', Rule::in([0, 1])],
            'tasks'                     => ['required', 'array'],
            'tasks.*.id'                => ['required', Rule::exists('tasks', 'id')],
            'tasks.*.point_accuracy'    => ['required', 'integer', 'min:0'],
            'tasks.*.point_consistency' => ['required', 'integer', 'min:0'],
        ];
    }
}
