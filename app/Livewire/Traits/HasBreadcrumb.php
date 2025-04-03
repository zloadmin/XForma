<?php
declare(strict_types=1);


namespace App\Livewire\Traits;


use App\Models\Question;
use App\Models\Quiz;
use App\Models\User;

trait HasBreadcrumb
{
    private function getHomeItem(): array
    {
        return [route('dashboard') => 'Панель'];
    }
        private function getTeachersPageItem(): array
    {
        return [route('teachers-page') => 'Преподаватели'];
    }
    private function getStudentsPageItem(): array
    {
        return [route('teachers-page') => 'Ученики'];
    }
    private function getTasksPageItem(): array
    {
        return [route('tasks-page') => 'Задания'];
    }
    private function getTicketsPageItem(): array
    {
        return [route('tickets-page') => 'Билеты'];
    }

//
//    private function getQuizzesPageItem(): array
//    {
//        return [route('quizzes-page') => 'Квизы'];
//    }
//
//    private function getUserAnswersPageItem(): array
//    {
//        return [route('user-answers-page') => 'Ответы'];
//    }
//
//    private function getUsersPageItem(): array
//    {
//        return [route('users-page') => 'Пользователи'];
//    }
//
//    private function getCreateUserPageItem(): array
//    {
//        return [route('create-user-page') => 'Создать пользователя'];
//    }
//    private function getEditUserPageItem(User $user): array
//    {
//        return [route('edit-user-page', $user) => 'Редактировать пользователя'];
//    }
//
//    private function getCreateQuizPageItem(): array
//    {
//        return [route('create-quiz-page') => 'Создать квиз'];
//    }
//
//    private function getCreateQuestionPageItem(Quiz $quiz): array
//    {
//        return [route('create-question-page', $quiz) => 'Создать вопрос'];
//    }
//
//    private function getEditQuestionPageItem(Quiz $quiz, Question $question): array
//    {
//        return [route('create-question-page', [$quiz, $question]) => 'Редактировать вопрос'];
//    }
//
//    private function getEditQuizPageItem(Quiz $quiz): array
//    {
//        return [route('edit-quiz-page', $quiz) => 'Редактировать квиз'];
//    }
//
//    private function getQuizItem(Quiz $quiz): array
//    {
//        return [route('edit-quiz-page', $quiz) => sprintf('Квиз "%s"', $quiz->name)];
//    }
//
//    private function getQuestionsQuizPageItem(Quiz $quiz): array
//    {
//        return [route('questions-page', $quiz) => 'Вопросы'];
//    }
//
//    private function getQuizzesPageBreadcrumb(): array
//    {
//        return $this->getQuizzesPageItem();
//    }
//
//    private function getUserAnswersPageBreadcrumb(): array
//    {
//        return $this->getUserAnswersPageItem();
//    }
//
//    private function getUsersPageBreadcrumb(): array
//    {
//        return $this->getUsersPageItem();
//    }
//
//    private function getCreateUserPageBreadcrumb(): array
//    {
//        return $this->getUsersPageItem() + $this->getCreateUserPageItem();
//    }
//    private function getEditUserPageBreadcrumb(User $user): array
//    {
//        return $this->getUsersPageItem() + $this->getEditUserPageItem($user);
//    }
//
//    private function getCreateQuizPageBreadcrumb()
//    {
//        return $this->getQuizzesPageItem() + $this->getCreateQuizPageItem();
//    }
//
//    private function getEditQuizPageBreadcrumb(Quiz $quiz)
//    {
//        return $this->getQuizzesPageItem() + $this->getEditQuizPageItem($quiz);
//    }
//
//    private function getQuestionsQuizPageBreadcrumb(Quiz $quiz)
//    {
//        return $this->getQuizzesPageItem() + $this->getQuizItem($quiz) + $this->getQuestionsQuizPageItem($quiz);
//    }
//
//    private function getCreateQuestionQuizPageBreadcrumb(Quiz $quiz)
//    {
//        return $this->getQuizzesPageItem() + $this->getQuizItem($quiz) + $this->getQuestionsQuizPageItem($quiz) + $this->getCreateQuestionPageItem($quiz);
//    }
//
//    private function getEditQuestionQuizPageBreadcrumb(Quiz $quiz, Question $question)
//    {
//        return $this->getQuizzesPageItem() + $this->getQuizItem($quiz) + $this->getQuestionsQuizPageItem($quiz) + $this->getEditQuestionPageItem($quiz, $question);
//    }
}