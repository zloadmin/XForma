<?php

namespace App\Http\Resources\User;

use App\Enums\User\UserRole;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        return [
            'id'             => $this->id,
            'full_name'      => $this->full_name,
            'email'          => $this->email,
            'random_mode'    => $this->when($this->isStudent(), 'random_mode'),
            'education_mode' => $this->when($this->isStudent(), 'education_mode'),
            'tickets' => $this->when($this->isStudent(), function () {
                return $this->tickets()->get();
            }),
//            'random_mode' => $this->when($this->role == UserRole::Student, function () {
//                return $this->random_mode
//            }),
            'created_at'     => $this->created_at,
            'updated_at'     => $this->updated_at,
        ];
    }
}
