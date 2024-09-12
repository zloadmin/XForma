<?php

namespace App\Livewire\Pages;

use Livewire\Attributes\Title;
use Livewire\Component;

class QuizzesPage extends Component
{
    #[Title('Квизы')]
    public function render()
    {
        return view('livewire.pages.quizzes-page');
    }
}
