<?php
declare(strict_types=1);


namespace App\Livewire\Traits;


use App\Models\Question;
use App\Models\Quiz;

trait HasBreadcrumb
{
    private function getHomeItem(): array
    {
        return [route('dashboard') => 'Панель'];
    }

    private function getQuizzesPageItem(): array
    {
        return [route('quizzes-page') => 'Квизы'];
    }

    private function getCreateQuizPageItem(): array
    {
        return [route('create-quiz-page') => 'Создать квиз'];
    }

    private function getCreateQuestionPageItem(Quiz $quiz): array
    {
        return [route('create-question-page', $quiz) => 'Создать вопрос'];
    }

    private function getEditQuestionPageItem(Quiz $quiz, Question $question): array
    {
        return [route('create-question-page', [$quiz, $question]) => 'Редактировать вопрос'];
    }

    private function getEditQuizPageItem(Quiz $quiz): array
    {
        return [route('edit-quiz-page', $quiz) => 'Редактировать квиз'];
    }

    private function getQuizItem(Quiz $quiz): array
    {
        return [route('edit-quiz-page', $quiz) => sprintf('Квиз "%s"', $quiz->name)];
    }

    private function getQuestionsQuizPageItem(Quiz $quiz): array
    {
        return [route('questions-page', $quiz) => 'Вопросы'];
    }

    private function getQuizzesPageBreadcrumb(): array
    {
        return $this->getQuizzesPageItem();
    }

    private function getCreateQuizPageBreadcrumb()
    {
        return $this->getQuizzesPageItem() + $this->getCreateQuizPageItem();
    }

    private function getEditQuizPageBreadcrumb(Quiz $quiz)
    {
        return $this->getQuizzesPageItem() + $this->getEditQuizPageItem($quiz);
    }

    private function getQuestionsQuizPageBreadcrumb(Quiz $quiz)
    {
        return $this->getQuizzesPageItem() + $this->getQuizItem($quiz) + $this->getQuestionsQuizPageItem($quiz);
    }

    private function getCreateQuestionQuizPageBreadcrumb(Quiz $quiz)
    {
        return $this->getQuizzesPageItem() + $this->getQuizItem($quiz) + $this->getQuestionsQuizPageItem($quiz) + $this->getCreateQuestionPageItem($quiz);
    }

    private function getEditQuestionQuizPageBreadcrumb(Quiz $quiz, Question $question)
    {
        return $this->getQuizzesPageItem() + $this->getQuizItem($quiz) + $this->getQuestionsQuizPageItem($quiz) + $this->getEditQuestionPageItem($quiz, $question);
    }
}