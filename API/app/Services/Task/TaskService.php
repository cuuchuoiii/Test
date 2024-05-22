<?php
namespace App\Services\Task;

use App\Models\Task;
use App\Repositories\Task\TaskRepository;
use Illuminate\Support\Collection;

interface TaskService
{
    public function getRepository(): TaskRepository;

    public function getAll(): Collection;

    public function createTask(array $attributes): Task;

    public function UpdateTask(array $attributes): mixed;

    public function DeleteTask(int $id): bool;

    public function UpdateLocationTask(array $attributes): bool;

}   
