<?php
declare(strict_types=1);


namespace App\Livewire\Pages\Question;


use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Support\Collection;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\FileUploadConfiguration;

use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\WithFileUploads;

trait HasQuestionForm
{
    use WithFileUploads;

    #[Validate('required')]
    public $isRight;


    #[Validate('required')]
    public $questionText = '';

//    #[Validate(['answerImages' => 'array|min:2'])]
    #[Validate(['answerImages.*' => 'image|max:102400'])]
    public $answerImages;


    public Collection $existsAnswerImages;
    public array $deleteExistsAnswerImagesIds;


    public function messages()
    {
        return [
            'answerList.*.required' => 'Поле ответ обязательно для заполнения',
            'isRight'               => 'Не выбран правильный ответ. Кликните на картинку с правильным ответом',
            'answerImages.min'      => 'Минимальное количество ответов 2',
        ];
    }

    public function deleteAnswerImage($key): void
    {
        if (isset($this->answerImages[$key])) {
            unset($this->answerImages[$key]);
        }
    }

    public function deleteExistFile($id): void
    {
        $this->existsAnswerImages = $this->existsAnswerImages->filter(function ($image) use ($id) {
            return $image->id != $id;
        });
        $this->deleteExistsAnswerImagesIds[$id] = $id;
        $this->isRight = null;
    }

    public function setExistsAnswerImages(): void
    {
        $this->existsAnswerImages = $this->question->answerImages()->orderBy('id')->get();
    }

    public function setIsRight(): void
    {
        foreach ($this->existsAnswerImages as $index => $answerImage) {
            if ($answerImage->is_right) {
                $this->isRight = $index;
            }
        }
    }
    public function deleteExistsAnswerImages(): void
    {
        $this->question->answerImages()->whereIn('id', $this->deleteExistsAnswerImagesIds)->delete();
    }

    public function storeAnswerImages(Question $question): void
    {
        foreach ($this->answerImages as $index => $answerImage) {
            $question->answerImages()->create([
                'path'          => $answerImage->store('answer_images'),
                'original_name' => $answerImage->getClientOriginalName(),
                'size'          => $answerImage->getSize(),
                'is_right'      => $this->isRight == $index
            ]);
        }
    }
    public function _finishUpload($name, $tmpPath, $isMultiple)
    {
        if (FileUploadConfiguration::shouldCleanupOldUploads()) {
            $this->cleanupOldUploads();
        }

        if ($isMultiple) {
            $file = collect($tmpPath)->map(function ($i) {
                return TemporaryUploadedFile::createFromLivewire($i);
            })->toArray();
            $file = array_merge($this->getPropertyValue($name), $file);
            $this->dispatch('upload:finished', name: $name, tmpFilenames: collect($file)->map->getFilename()->toArray())->self();
        } else {
            $file = TemporaryUploadedFile::createFromLivewire($tmpPath[0]);
            $this->dispatch('upload:finished', name: $name, tmpFilenames: [$file->getFilename()])->self();

            // If the property is an array, but the upload ISNT set to "multiple"
            // then APPEND the upload to the array, rather than replacing it.
            if (is_array($value = $this->getPropertyValue($name))) {
                $file = array_merge($value, [$file]);
            }
        }

        app('livewire')->updateProperty($this, $name, $file);

    }
}