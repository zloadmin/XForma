<?php

namespace App\Http\Resources\Result;

use App\Http\Resources\Ticket\TicketResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResultResource extends JsonResource
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
            'user_id'        => $this->user_id,
            'user'           => new UserResource($this->whenLoaded('user')),
            'ticket_id'      => $this->ticket_id,
            'ticket'         => new TicketResource($this->whenLoaded('ticket')),
            'resultTasks'    => ResultTaskResource::collection($this->whenLoaded('resultTasks')),
            'education_mode' => $this->education_mode,
            'is_success'     => $this->is_success,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
        ];
    }
}
