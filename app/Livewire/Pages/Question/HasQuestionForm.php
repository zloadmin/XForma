<?php
declare(strict_types=1);


namespace App\Livewire\Pages\Question;


use App\Models\Quiz;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;

trait HasQuestionForm
{
//    use WithFileUploads;
    #[Validate([
        'answerList'   => ['required', 'array'],
        'answerList.*' => ['required'],
    ])]
    public array $answerList;

    #[Validate('required')]
    public $is_right;


    #[Validate('required')]
    public $question_text = '';


//    #[Validate(['question_media.*' => 'required|image|max:10240'])]
//    public $question_media = [];

    public function messages()
    {
        return [
            'answerList.*.required' => 'Поле ответ обязательно для заполнения',
        ];
    }


    public function addAnswer(): void
    {
        $this->answerList[] = "";
    }

    public function deleteAnswer(int $index): void
    {
        if (isset($this->answerList[$index])) {
            if ($index == $this->is_right) {
                $this->is_right = null;
            }
            unset($this->answerList[$index]);
            $this->answerList = array_values($this->answerList);
        }
    }

    public function getEmptyAnswerList(): array
    {
        return [""];
    }
}