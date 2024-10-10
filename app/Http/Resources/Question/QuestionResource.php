<?php

namespace App\Http\Resources\Question;

use App\Http\Resources\Answer\AnswerResource;
use App\Http\Resources\AnswerImage\AnswerImageResource;
use App\Http\Resources\Media\MediaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'      => $this->id,
            'text'    => $this->text,
            'answerImages' => AnswerImageResource::collection($this->whenLoaded('answerImages')),
        ];
    }
}
