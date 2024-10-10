<?php

namespace App\Livewire\Pages;

use App\Livewire\Pages\Question\HasQuestionForm;
use App\Livewire\Traits\HasBreadcrumb;
use App\Models\Quiz;
use Illuminate\Support\Collection;
use Livewire\Attributes\Validate;
use Livewire\Component;


class CreateQuestionPage extends Component
{
    use HasBreadcrumb;
    use HasQuestionForm;


    public Quiz $quiz;

    public function mount(Quiz $quiz)
    {
        $this->quiz = $quiz;
        $this->existsAnswerImages = new Collection();
        $this->answerImages = [];
    }

    public function saveQuestion()
    {
        $this->validate();

        $question = $this->quiz->questions()->create([
            'text' => $this->questionText
        ]);
        $this->storeAnswerImages($question);

        return $this->redirectRoute('questions-page', [$this->quiz], true, true);
    }

    public function render()
    {
        return view('livewire.pages.create-question-page')
            ->layout('components.layouts.app-simple')
            ->title($this->getTitle())
            ->layoutData([
                'breadcrumb' => $this->getCreateQuestionQuizPageBreadcrumb($this->quiz)
            ]);
    }

    public function getTitle()
    {
        return sprintf('Создать вопрос');
    }
}
