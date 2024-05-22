<?php
namespace App\Services\Task;

use App\Models\Task;
use App\Repositories\Task\TaskRepository;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;


class TaskServiceEloquent implements TaskService
{
    public function __construct(protected TaskRepository $taskRepository)
    {
    }


    public function getRepository(): TaskRepository
    {
        return $this->taskRepository;
    }

    public function getAll(): Collection
    {
        return $this->taskRepository->all();
    }

    public function createTask(array $attributes): Task
    {
        return $this->taskRepository->create($attributes);
    }

    public function UpdateTask(array $attributes): mixed
    {
        return $this->taskRepository
                 ->where('id', $attributes['id'])
                 ->update([
                     'content' => $attributes['updatecontent'],
                 ]);
    }

    public function DeleteTask(int $id): bool
    {
        return $this->taskRepository->delete($id);
    }

    public function UpdateLocationTask(array $contents): bool
    {
        DB::beginTransaction();
        try {
            $tasks = $this->taskRepository->all();
            if (count($contents) !== $tasks->count()) {
                throw new \Exception('Số lượng giá trị không khớp');
            }
            foreach ($tasks as $index => $task) {
                $task->content = $contents[$index];
                $task->save();
            }
            DB::commit();
            return true;
        } catch (\Exception $e) {
            DB::rollback();
            return false;
        }
    }
}
