<?php

namespace App\Http\Resources\Task;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'type'           => $this->type,
            'equipment_name' => $this->equipment_name,
            'name'           => $this->name,
            'description'    => $this->description,
            'updated_at'     => $this->updated_at,
            'created_at'     => $this->created_at,
        ];
    }
}
