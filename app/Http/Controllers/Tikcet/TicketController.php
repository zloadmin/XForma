<?php

namespace App\Http\Controllers\Tikcet;

use App\Http\Controllers\Controller;
use App\Http\Resources\Ticket\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;

/**
 * @group Билеты
 */
class TicketController extends Controller
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

}
