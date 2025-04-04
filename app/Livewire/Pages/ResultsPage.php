<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\HasBreadcrumb;
use Livewire\Attributes\Title;
use Livewire\Component;

class ResultsPage extends Component
{
    use HasBreadcrumb;

    #[Title('Результаты')]
    public function render()
    {
        return view('livewire.pages.results-page')->layoutData([
            'breadcrumb' => $this->getResultsPageItem()
        ]);
    }

}
