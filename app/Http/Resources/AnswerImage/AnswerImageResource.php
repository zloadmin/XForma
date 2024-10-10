<?php

namespace App\Http\Resources\AnswerImage;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AnswerImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'       => $this->id,
            'url'      => $this->getUrl(),
            'is_right' => $this->is_right
        ];
    }
}
