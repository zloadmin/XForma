<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\HasBreadcrumb;
use App\Models\Task;
use App\Models\Ticket;
use Livewire\Attributes\Title;
use Livewire\Component;

class TicketsPage extends Component
{
    use HasBreadcrumb;

    public $tickets;

    public function mount()
    {
        $this->tickets = Ticket::with('tasks')->orderBy('id')->get();
    }
    #[Title('Билеты')]
    public function render()
    {
        return view('livewire.pages.tickets-page')->layoutData([
            'breadcrumb' => $this->getTicketsPageItem()
        ]);
    }
}
