<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    use HttpResponses;
    public function index()
    {
        return TaskResource::collection(Task::where('user_id',auth()->user()->id)->get());
    }

    public function store(TaskRequest $request)
    {
        $validated = $request->validated();
        $task = Task::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'priority' => $validated['priority'],
            'status' => $validated['status'],
            'user_id' => auth()->user()->id
        ]);
        return new TaskResource($task);
    }

    public function show(Task $task)
    {
        if(Gate::denies('update-task', $task)){
            return $this->error('You are not allowed to update this task', 403);
        }
        return new TaskResource($task);
    }

    public function update(Request $request, Task $task)
    {
        if(!Gate::allows('update-task', $task)){
            return $this->error('You are not allowed to update this task', 403);
        }
        $task->update($request->all());

        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        if(Gate::denies('update-task', $task)){
            return $this->error('You are not allowed to delete this task', 403);
        }
        $task->delete();

        return $this->success("","Task deleted successfully", 200);
    }
}
