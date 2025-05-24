<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'task' => 'required|string',
        'service_id' => 'required|exists:services,id',
    ]);

    $task = Task::create([
        'user_id' => $request->user_id,
        'task' => $request->task,
        'service_id' => $request->service_id,
    ]);

    // Load service relation for response
    $task->load('service');

    return response()->json([
        'message' => 'Task added successfully!',
        'task' => $task
    ]);
}

}
