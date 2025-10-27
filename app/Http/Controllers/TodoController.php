<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    // Get all todos
    public function index()
    {
        return response()->json(Todo::all());
    }

    // Get single todo
    public function show($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }
        return response()->json($todo);
    }

    // Create new todo
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'nullable|string',
        ]);

        $todo = Todo::create($request->all());
        return response()->json($todo, 201);
    }

    // Update todo
   public function update(Request $request, $id)
{
    $todo = Todo::find($id);
    if (!$todo) {
        return response()->json(['message' => 'Todo not found'], 404);
    }

    // Only update the fields that are provided
    $todo->update([
        'title' => $request->input('title', $todo->title),
        'description' => $request->input('description', $todo->description),
        'completed' => $request->input('completed', $todo->completed),
    ]);

    return response()->json($todo);
}

    // Delete todo
    public function destroy($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(['message' => 'Todo not found'], 404);
        }

        $todo->delete();
        return response()->json(['message' => 'Todo deleted successfully']);
    }
}
