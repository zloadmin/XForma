<?php

namespace App\Http\Resources\TicketAnswer;

use App\Http\Resources\Ticket\TicketStepActionResource;
use App\Http\Resources\Ticket\TicketStepResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketAnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                            => $this->id,
//            'ticket_id'                     => $this->ticket_id,
            'ticket_step_id'                => $this->ticket_step_id,
            'ticket_step'                   => TicketStepResource::make($this->whenLoaded('ticket_step')),
            'ticket_step_action_id'         => $this->ticket_step_action_id,
            'ticket_step_action_type'       => $this->ticket_step_action_type,
            'ticket_step_action_type_label' => $this->ticket_step_action_type->label(),
            'ticket_step_action'            => TicketStepActionResource::make($this->whenLoaded('ticket_step_action')),
            'points'                        => $this->points,
            'created_at'                    => $this->created_at,
            'updated_at'                    => $this->updated_at,
        ];
    }
}
