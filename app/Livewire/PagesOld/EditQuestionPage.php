<?php

namespace App\Livewire\Pages;

use App\Livewire\Pages\Question\HasQuestionForm;
use App\Livewire\Traits\HasBreadcrumb;
use App\Models\Question;
use App\Models\Quiz;
use Livewire\Component;

class EditQuestionPage extends Component
{
    use HasBreadcrumb;
    use HasQuestionForm;

    public Quiz $quiz;
    public Question $question;

    public function mount(Quiz $quiz, Question $question)
    {
        $this->quiz = $quiz;
        $this->question = $question;
        $this->questionText = $question->text;
        $this->answerImages = [];
        $this->setExistsAnswerImages();
        $this->setIsRight();
    }


    public function saveQuestion()
    {
        $this->validate();
        $this->question->update(['text' => $this->questionText]);
        $this->deleteExistsAnswerImages();
        $this->storeAnswerImages($this->question);
        $this->question->updateRightAnswerImageByIndex($this->isRight);

        return $this->redirectRoute('questions-page', [$this->quiz], true, true);
    }

    public function render()
    {
        return view('livewire.pages.edit-question-page')
            ->title($this->getTitle())
            ->layout('components.layouts.app-simple')
            ->layoutData([
                'breadcrumb' => $this->getEditQuestionQuizPageBreadcrumb($this->quiz, $this->question)
            ]);
    }

    public function getTitle()
    {
        return sprintf('Редактировать вопрос');
    }
}
