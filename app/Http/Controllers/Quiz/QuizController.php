<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\ApiController;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserAnswer\StoreUserAnswer;
use App\Http\Resources\Quiz\QuizResource;
use App\Http\Resources\UserAnswer\UserAnswerResource;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\UserAnswer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * @group Квизы
 */
class QuizController extends ApiController
{

    /**
     * Список квизов
     *
     * @authenticated
     * @apiResourceCollection App\Http\Resources\Quiz\QuizResource
     * @apiResourceModel App\Models\Quiz paginate=15
     * @queryParam page int The page number.
     */
    public function list()
    {
        $quizzes = Quiz::query()->latest();

        return QuizResource::collection($quizzes->paginate());
    }

    /**
     * Получить квиз c вопросами и вариантами ответов
     *
     * @authenticated
     * @apiResource App\Http\Resources\Quiz\QuizResource
     * @apiResourceModel App\Models\Quiz with=questions,questions.answerImages
     */
    public function show(Quiz $quiz)
    {
        $quiz->load(['questions', 'questions.answerImages']);
        return new QuizResource($quiz);
    }

    /**
     * Статистика ответов квиза
     *
     * @authenticated
     * @response {"quiz_questions":36,"all_answers":0,"right_answers":0,"wrong_answers":0}
     */
    public function statistics(Quiz $quiz)
    {
        $answers = UserAnswer::byQuiz($quiz)->byUser(auth()->user())->get();

        return $this->respond([
            'quiz_questions' => $quiz->questions()->count(),
            'all_answers'    => $answers->count(),
            'right_answers'  => $answers->where('is_right', true)->count(),
            'wrong_answers'  => $answers->where('is_right', false)->count(),
        ]);
    }

    /**
     * Ответить на вопрос
     *
     * @response status=400 scenario="Answer already exists"  {"status":"error","message":"Answer already exists"}
     * @response status=404 scenario="Quiz not found"  {"status":"error","message":"Quiz not found"}
     * @response status=404 scenario="Question not found"  {"status":"error","message":"Question not found"}
     * @response status=404 scenario="Answer image not found"  {"status":"error","message":"Answer image not found"}
     * @response status=422 scenario="Validation Errors" {"message":"The spend time field is required.","errors":{"spend_time":["The spend time field is required."]}}
     * @apiResource App\Http\Resources\UserAnswer\UserAnswerResource
     * @apiResourceModel App\Models\UserAnswer
     * @param StoreUserAnswer $request
     * @param int $quiz_id
     * @param int $question_id
     * @param int $answer_image_id
     * @return UserAnswerResource|JsonResponse
     */
    public function answerToQuestion(StoreUserAnswer $request, int $quiz_id, int $question_id, int $answer_image_id)
    {
        $quiz = Quiz::find($quiz_id);
        if (!$quiz) return $this->respondNotFound('Quiz not found');

        $question = $quiz->questions()->where('id', $question_id)->first();
        if (!$question) return $this->respondNotFound('Question not found');

        $answerImage = $question->answerImages()->where('id', $answer_image_id)->first();
        if (!$answerImage) return $this->respondNotFound('Answer not found');

        $userAnswerExists = UserAnswer::byQuiz($quiz)->byQuestion($question)->byAnswerImage($answerImage)->byUser(auth()->user())->exists();

        if ($userAnswerExists) {
            return $this->respondBadRequest('Answer already exists');
        }
        $userAnswer = UserAnswer::create([
            'user_id'     => auth()->id(),
            'quiz_id'     => $quiz->id,
            'question_id' => $question->id,
            'answer_image_id'   => $answerImage->id,
            'is_right'    => $answerImage->is_right,
            'spend_time'  => $request->spend_time,
            // TODO: save question with answers.
        ]);
        return new UserAnswerResource($userAnswer);

    }
}
