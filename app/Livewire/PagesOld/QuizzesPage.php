<?php

namespace App\Livewire\Pages;

use App\Livewire\Traits\HasBreadcrumb;
use App\Models\Quiz;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class QuizzesPage extends Component
{
    use WithPagination, HasBreadcrumb;

    public function delete($quizId)
    {
        $quiz = Quiz::find($quizId);
        if ($quiz) $quiz->delete();
    }

    #[Title('Квизы')]
    public function render()
    {
        return view('livewire.pages.quizzes-page', [
            'quizzes' => Quiz::withCount('questions')->paginate()
        ])->layoutData([
            'breadcrumb' => $this->getQuizzesPageBreadcrumb()
        ]);
    }


}
