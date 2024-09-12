<?php

namespace App\Livewire\Pages;

use Livewire\Component;
use Livewire\Attributes\Title;

class DashboardPage extends Component
{



    #[Title('Панель')]
    public function render()
    {
        return view('livewire.pages.dashboard-page');
    }
}
