<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\HasBreadcrumb;
use Livewire\Component;

abstract class BasePage extends Component
{
    use HasBreadcrumb;
    abstract function getBreadcrumb(): array;

    public function getLayoutData(): array
    {

        return [
            'breadcrumb' => $this->getBreadcrumb(),
        ];
    }
}
