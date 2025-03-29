<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\HasBreadcrumb;
use Livewire\Attributes\Title;
use Livewire\Component;

class UsersPage extends Component
{
    use HasBreadcrumb;

    #[Title('Пользователи')]
    public function render()
    {
        return view('livewire.pages.users-page')->layoutData([
            'breadcrumb' => $this->getUsersPageBreadcrumb()
        ]);
    }
}
