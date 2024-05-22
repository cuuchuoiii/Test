<?php
namespace App\Repositories\Task;

use App\Models\Task;
use Prettus\Repository\Eloquent\BaseRepository;

class TaskRepositoryEloquent extends BaseRepository implements TaskRepository
{

    public function model()
    {
        return Task::class;
    }
}
