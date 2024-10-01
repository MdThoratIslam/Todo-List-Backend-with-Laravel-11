<?php

namespace App\Http\Controllers\Task;

use App\Models\Task\Task;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\Task\TaskResource;

class TaskController extends Controller
{
    public function index()
    {
        try {
            $tasks = Task::orderBy('id')->cursorPaginate(5);
            if ($tasks->isEmpty()) {
                return response()->json(['message' => 'No tasks found.']);
            }
            return response()->json([
                'message' => 'Tasks fetched successfully.',
                'data' => TaskResource::collection($tasks)
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching tasks: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch tasks.'], 500);
        }
    }
    public function store(StoreTaskRequest $request)
    {
        try {
            $validatedData                      = $request->validated();
            $validatedData['user_id']           = auth()->user()->id;
            $validatedData['status_active']     = $validatedData['status_active'] ?? 1;
            $validatedData['is_delete']         = $validatedData['is_delete'] ?? 0;
            $task                               = Task::create($validatedData);
            return response()->json([
                'message'                       => 'Task created successfully.',
                'data'                          =>TaskResource::make($task)
            ], 201);
        } catch (\Exception $e)
        {
            Log::error('Error creating task: ' . $e->getMessage());
            return response()->json([
                'error'                         => 'Failed to create task.'.$e->getMessage()
            ], 500);
        }

    }
    public function show(Task $task)
    {
        try {
            return response()->json([
                    'message'   => 'Task fetched successfully.',
                    'data'      => TaskResource::make($task)]
            );
        } catch (\Exception $e) {
            Log::error('Error fetching task: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to fetch task.'], 500);
        }
    }
    public function update(UpdateTaskRequest $request, Task $task)
    {
        try {
            $validatedData = $request->validated();
            $task->update($validatedData);
            return response()->json([
                'message'   => 'Task updated successfully.',
                'data'      =>TaskResource::make($task)
            ]);
        } catch (\Exception $e) {
            Log::error('Error updating task: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to update task.'.$e->getMessage()], 500);
        }
    }
    public function destroy(Task $task)
    {
        try {
            $task->delete();
            return response()->json(['message' => 'Task deleted successfully.', 'data' => TaskResource::make($task)]);
        } catch (\Exception $e) {
            Log::error('Error deleting task: ' . $e->getMessage());
            return response()->json(['error' => 'Failed to delete task.'], 500);
        }
    }
}
