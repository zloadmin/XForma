<?php

namespace App\Livewire\Pages;

use App\Livewire\Pages\Question\HasQuestionForm;
use App\Livewire\Traits\HasBreadcrumb;
use App\Models\Quiz;
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
        $this->answerList = $this->getEmptyAnswerList();
    }

    public function saveQuestion()
    {
        $this->validate();
        $question = $this->quiz->questions()->create([
            'text' => $this->question_text
        ]);
        foreach ($this->answerList as $index => $answer) {
            $question->answers()->create([
                'text'     => $answer,
                'is_right' => $this->is_right == $index
            ]);
        }

//        foreach ($this->question_media as $media) {
//            $question->media()->create([
//                'path'          => $media->store(path: 'media'),
//                'original_name' => $media->getClientOriginalName(),
//                'size'          => $media->getSize(),
//            ]);
//        }
        return $this->redirectRoute('questions-page', [$this->quiz], true, true);
    }

    public function render()
    {
        return view('livewire.pages.create-question-page')
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
