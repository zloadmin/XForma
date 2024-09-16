<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\HasBreadcrumb;
use App\Models\UserAnswer;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class UserAnswersPage extends Component
{
    use HasBreadcrumb;
    use WithPagination;

    #[Title('Ответы')]
    public function render()
    {
        return view('livewire.pages.user-answers-page', [
            'userAnswers' => UserAnswer::with(['quiz', 'user', 'question', 'answer'])->orderByDesc('created_at')->paginate()
        ])->layoutData([
            'breadcrumb' => $this->getUserAnswersPageBreadcrumb()
        ]);
    }
}
