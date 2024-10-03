<?php

namespace App\Http\Resources\Ticket;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketStepResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'               => $this->id,
            //            'ticket_id' => $this->ticket_id,
            'position'         => $this->position,
            'name'             => $this->name,
            'parent_positions' => $this->parent_positions,
            'statuses'         => TicketStepStatusResource::collection($this->whenLoaded('statuses')),
            'actions'         => TicketStepActionResource::collection($this->whenLoaded('actions'))
        ];
    }
}
