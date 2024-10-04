<?php

namespace App\Http\Controllers\Tikcet;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Resources\Ticket\TicketResource;
use App\Http\Resources\TicketAnswer\TicketAnswerResource;
use App\Models\Ticket;
use App\Models\TicketAnswer;
use App\Models\TicketStep;
use App\Models\TicketStepAction;
use Illuminate\Http\Request;

/**
 * @group Билеты
 */
class TicketController extends ApiController
{

    /**
     * Список билетов
     *
     * @authenticated
     * @apiResourceCollection App\Http\Resources\Ticket\TicketResource
     * @apiResourceModel App\Models\Ticket
     */
    public function list()
    {
        $ticket = Ticket::withCount(['steps']);
        return TicketResource::collection($ticket->get());
    }

    /**
     * Получить билет целиком
     *
     * @authenticated
     * @apiResource App\Http\Resources\Ticket\TicketResource
     * @apiResourceModel App\Models\Ticket with=steps,steps.statuses,steps.statuses
     */
    public function show(Ticket $ticket)
    {
        $ticket->load(['steps' => function ($query) {
            $query->orderBy('position');
        }, 'steps.statuses', 'steps.actions']);
        return new TicketResource($ticket);
    }

    /**
     * Ответить на вопрос
     *
     * @authenticated
     * @response 201
     */
    public function answer(Ticket $ticket, TicketStep $ticketStep, TicketStepAction $ticketStepAction)
    {
        $ticketAnswer = TicketAnswer::getFirstOrCreateOfAuthUser($ticket, $ticketStep);

        $ticketAnswer->update([
            'ticket_step_action_id'   => $ticketStepAction->id,
            'ticket_step_action_type' => $ticketStepAction->type,
            'points'                  => $ticketStepAction->type->points(),
        ]);

        return $this->respondCreated();
    }

    /**
     * Завершить опрос
     *
     * @authenticated
     * @apiResourceCollection App\Http\Resources\TicketAnswer\TicketAnswerResource
     * @apiResourceModel App\Models\TicketAnswer
     * @apiResourceAdditional ticket_name="Название билета" total_points=100
     */
    public function finish(Ticket $ticket)
    {
        $answers = TicketAnswer::with(['ticket_step', 'ticket_step.actions', 'ticket_step_action'])->where('user_id', auth()->id())->where('ticket_id', $ticket->id)->get();

        return TicketAnswerResource::collection($answers)->additional([
            'total_points' => $answers->sum('points'),
            'ticket_name'  => $ticket->name
        ]);
    }

}
