<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\HasBreadcrumb;
use App\Models\Question;
use App\Models\Quiz;
use Livewire\Component;

class QuestionsPage extends Component
{
    use HasBreadcrumb;

    public Quiz $quiz;

    public function mount(Quiz $quiz)
    {
        $this->quiz = $quiz;
    }

    public function render()
    {
        return view('livewire.pages.questions-quiz-page', [
            'questions' => $this->quiz->questions()->withCount('answerImages')->get()
        ])
            ->title($this->getTitle())
            ->layoutData([
                'breadcrumb' => $this->getQuestionsQuizPageBreadcrumb($this->quiz)
            ]);
    }

    public function delete($questionID)
    {
        $question = Question::find($questionID);
        if ($question) {
            $question->answers()->delete();
            $question->delete();
        }
    }

    public function getTitle()
    {
        return sprintf('Вопросы квиза');
    }
}
