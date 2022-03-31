<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    public function index() {
        $tasks = Task::all();
        return response()->json([
            'status' => 200,
            'data' => $tasks,
        ]);
    }

    public function add(Request $request) {
        $task = new Task;
        $task->name = $request->input('name');
        $task->type = $request->input('type');
        $task->status = $request->input('status');
        $task->description = $request->input('description');
        $task->save();
        return response()->json([
            'status' => 200,
            'message' => 'Task added successfully',
        ]);
    }

    public function edit($id) {
        $task = Task::find($id);
        return response()->json([
            'status' => 200,
            'data' => $task,
        ]);
    }

    public function update(Request $request, $id) {
        $task = Task::find($id);
        $task->name = $request->input('name');
        $task->type = $request->input('type');
        $task->status = $request->input('status');
        $task->description = $request->input('description');
        $task->update();
        return response()->json([
            'status' => 200,
            'data' => $task,
        ]);
    }

    public function delete($id) {
        $task = Task::find($id);
        $task->delete();
        return response()->json([
            'status' => 200,
            'message' => 'Task successfully deleted.',
        ]);
    }
}
