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
        $this->question_text = $question->text;
        $this->setAnswers($question);
    }

    public function setAnswers(Question $question)
    {
        foreach ($question->answers()->orderBy('id')->get() as $index => $answer) {
            $this->answerList[] = $answer->text;
            if ($answer->is_right) {
                $this->is_right = $index;
            }
        }
    }

    public function saveQuestion()
    {
        $this->validate();
        $this->question->update(['text' => $this->question_text]);
        $this->question->answers()->delete();
        foreach ($this->answerList as $index => $answer) {
            $this->question->answers()->create([
                'text'     => $answer,
                'is_right' => $this->is_right == $index
            ]);
        }

        return $this->redirectRoute('questions-page', [$this->quiz], true, true);
    }

    public function render()
    {
        return view('livewire.pages.edit-question-page')
            ->title($this->getTitle())
            ->layoutData([
                'breadcrumb' => $this->getEditQuestionQuizPageBreadcrumb($this->quiz, $this->question)
            ]);
    }

    public function getTitle()
    {
        return sprintf('Редактировать вопрос');
    }
}
