<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Resources\Quiz\QuizResource;
use App\Models\Quiz;
use Illuminate\Http\Request;

/**
 * @group Квизы
 */
class QuizController extends Controller
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
     * Квиз с ответами и вопросами
     *
     * @authenticated
     * @apiResource App\Http\Resources\Quiz\QuizResource
     * @apiResourceModel App\Models\Quiz with=questions,questions.answers,questions.media,questions.answers.media
     */
    public function show(Quiz $quiz)
    {
        $quiz->load(['questions', 'questions.answers', 'questions.media', 'questions.answers.media']);
        return new QuizResource($quiz);
    }
}
