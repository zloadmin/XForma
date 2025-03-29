<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\HasBreadcrumb;
use Livewire\Attributes\Title;
use Livewire\Component;

class TeachersPage extends Component
{
    use HasBreadcrumb;

    #[Title('Преподаватели')]
    public function render()
    {
        return view('livewire.pages.teachers-page')->layoutData([
            'breadcrumb' => $this->getTeachersPageItem()
        ]);
    }

}
