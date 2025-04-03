<?php

namespace App\Http\Controllers\Result;

use App\Http\Controllers\ApiController;


use App\Http\Requests\Auth\SignInUserRequest;
use App\Http\Requests\Result\StoreResultRequest;
use App\Http\Resources\Result\ResultResource;
use App\Http\Resources\User\UserResource;
use App\Models\ActiveUser;
use App\Models\Result;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


/**
 * @group Результаты сдачи
 */
class ResultController extends ApiController
{
    /**
     * Сохранение результатов
     *
     * @authenticated
     * @apiResource App\Http\Resources\Result\ResultResource
     * @apiResourceModel App\Models\Result with=user,ticket,resultTasks,resultTasks.task
     * @response status=429 scenario="Validation Errors"
     */
    public function store(StoreResultRequest $request)
    {
        $result = Result::create([
            'user_id'        => auth()->user()->id,
            'ticket_id'      => $request->ticket_id,
            'education_mode' => $request->education_mode,
            'is_success'     => $request->is_success,
        ]);
        foreach ($request->tasks as $task) {
            $result->resultTasks()->create([
                'task_id' => $task['id'],
                'point_accuracy' => $task['point_accuracy'],
                'point_consistency' => $task['point_consistency'],
            ]);
        }
        $result->load(['user', 'ticket', 'resultTasks', 'resultTasks.task']);
        return new ResultResource($result);
    }


}
