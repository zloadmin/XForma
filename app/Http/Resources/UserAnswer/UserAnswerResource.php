<?php

namespace App\Http\Resources\UserAnswer;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserAnswerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'user_id'     => $this->user_id,
            'quiz_id'     => $this->quiz_id,
            'question_id' => $this->question_id,
            'answer_id'   => $this->answer_id,
            'is_right'    => (bool)$this->is_right,
            'created_at'  => $this->created_at
        ];
    }
}
