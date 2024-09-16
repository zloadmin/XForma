<?php

namespace App\Livewire\Pages\Quiz;

use App\Livewire\Traits\HasBreadcrumb;
use App\Models\Quiz;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditQuizPage extends Component
{

    use HasBreadcrumb;

    public Quiz $quiz;
    #[Validate('required|string|max:250')]
    public $quiz_name = '';

    public function mount(Quiz $quiz)
    {
        $this->quiz = $quiz;
        $this->quiz_name = $quiz->name;
    }

    public function saveQuiz()
    {
        $this->validate();
        $this->quiz->update(['name' => $this->quiz_name]);
        return $this->redirectRoute('quizzes-page', [], true, true);
    }

    public function render()
    {
        return view('livewire.pages.quiz.edit-quiz-page')
            ->title($this->getTitle())
            ->layoutData([
                'breadcrumb' => $this->getEditQuizPageBreadcrumb($this->quiz)
            ]);
    }

    public function getTitle()
    {
        return sprintf('Редактировать квиз "%s"', $this->quiz->name);
    }
}
