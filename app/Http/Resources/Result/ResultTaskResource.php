<?php

namespace App\Http\Resources\Result;

use App\Http\Resources\Task\TaskResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultTaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                => $this->id,
            'result_id'         => $this->result_id,
            'task_id'           => $this->task_id,
            'point_accuracy'    => $this->point_accuracy,
            'point_consistency' => $this->point_consistency,
            'task'              => new TaskResource($this->whenLoaded('task')),
            'updated_at'        => $this->updated_at,
            'created_at'        => $this->created_at,
        ];
    }
}
