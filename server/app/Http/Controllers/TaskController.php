<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
class TaskController extends Controller
{
    //controllr function for display all task
    public function index()
    {
        try{
            $tasks = Task::all();
            return response()->json(['tasks' => $tasks]);
        }catch(\Exception $e){
            return response()->json(['error'=>'Error fetching tasks'],500);
        }
    }
    // controllr function for show perticuller task
    public function show($id)
    {
        try{
            $task = Task::findOrFail($id);
            return response()->json(['task' => $task]);
        }
        catch(\Exception $e){
            return response()->json(['error'=>'Task not found'],404);
        }
    }
    // controllr function for store task
    public function store(Request $request)
    {
        try{
            $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'nullable|string',
            'completed' => 'boolean',
            'due_date' => 'nullable|date',
        ]);

        $task = Task::create($validatedData);
        return response()->json(['task' => $task], 201);
        }catch (\Exception $e) {
            return response()->json(['error' => 'Error creating task'], 500);
        }
    }

    // controllr function for update task
    public function update(Request $request, $id)
    {
        try{
            $validatedData = $request->validate([
            'name' => 'string',
            'description' => 'nullable|string',
            'completed' => 'boolean',
            'due_date' => 'nullable|date',
            ]);

            $task = Task::findOrFail($id);
            $task->update($validatedData);

            return response()->json(['task' => $task]);
        }catch (\Exception $e) {
            return response()->json(['error' => 'Error update task'], 500);
        }
    }

    // controllr function for update task
    public function destroy($id)
    {
    try{
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Task deleted successfully']);
    }catch (\Exception $e) {
        return response()->json(['error' => 'Error deleting task'], 500);
    }
    }
}