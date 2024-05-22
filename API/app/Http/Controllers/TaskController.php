<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteTaskRequest;
use App\Http\Requests\TaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use App\Services\Task\TaskService;
use App\Traits\APIResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use APIResponseTrait;

    public function __construct( protected TaskService $taskService )
    {
    }

    public function AllProduct()
    {
        try {
            $data = $this->taskService->getAll();
            // return $this->successResponse(TaskResource::collection($data), 'Successfully', 200);
            return $data;
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Somethings went wrong', 500);
        }
    }

    public function createTask(TaskRequest $request): JsonResponse
    {
        try {
            $result = $this->taskService->createTask($request->all());
            if (!$result) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            return $this->successResponse($result, 'create Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Something wents wrong', 500);
        }
    }

    public function updateTask(UpdateTaskRequest $request): JsonResponse
    {
        try {
            $result = $this->taskService->UpdateTask($request->all());
            if (!$result) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            return $this->successResponse($result, 'Update Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Something wents wrong', 500);
        }
    }

    public function deleteTask(int $id): JsonResponse
    {
        try {
            $result = $this->taskService->DeleteTask($id);
            if (!$result) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
            return $this->successResponse($result, 'Delete Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Something wents wrong', 500);
        }
    }
    public function updateLocationTask(Request $request): JsonResponse
    {
        try {
            $contents = $request->input('content');
    
            $result = $this->taskService->UpdateLocationTask($contents);
    
            if (!$result) {
                return $this->errorResponse(null, 'Somethings went wrong', 400);
            }
    
            return $this->successResponse($result, 'Update Successfully', 200);
        } catch (\Exception $exception) {
            return $this->errorResponse($exception->getMessage(), 'Something wents wrong', 500);
        }
    }
}
