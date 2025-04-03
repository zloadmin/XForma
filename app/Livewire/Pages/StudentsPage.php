<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\HasBreadcrumb;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;

class StudentsPage extends Component
{
    use HasBreadcrumb;
    #[Url]
    public int|null $teacher_id = null;

    #[Title('Ученики')]
    public function render()
    {

        return view('livewire.pages.students-page')->layoutData([
            'breadcrumb' => $this->getStudentsPageItem()
        ]);
    }

}
