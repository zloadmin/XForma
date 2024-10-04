<?php

namespace App\Models;

use App\Enums\TicketStepAction\ActionType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TicketAnswer extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'ticket_step_action_type' => ActionType::class
    ];

    public function ticket_step()
    {
        return $this->belongsTo(TicketStep::class);
    }
    public function ticket_step_action()
    {
        return $this->belongsTo(TicketStepAction::class);
    }

    static function getFirstOrCreateOfAuthUser(Ticket $ticket, TicketStep $ticketStep): TicketAnswer
    {
        return TicketAnswer::firstOrCreate([
            'user_id'        => auth()->id(),
            'ticket_id'      => $ticket->id,
            'ticket_step_id' => $ticketStep->id,
        ]);
    }
}
