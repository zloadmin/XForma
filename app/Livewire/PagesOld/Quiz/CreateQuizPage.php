<?php

namespace App\Livewire\Pages\Quiz;

use App\Livewire\Traits\HasBreadcrumb;
use App\Models\Quiz;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;


class CreateQuizPage extends Component
{
    use HasBreadcrumb;


    #[Validate('required|string|max:250')]
    public $quiz_name = '';


    public function saveQuiz()
    {
        $this->validate();
        $quiz = Quiz::create(['name' => $this->quiz_name]);
        return $this->redirectRoute('questions-page', [$quiz], true, true);
    }

    #[Title('Создать квиз')]
    public function render()
    {
        return view('livewire.pages.quiz.create-quiz-page')->layoutData([
            'breadcrumb' => $this->getCreateQuizPageBreadcrumb()
        ]);
    }
}
