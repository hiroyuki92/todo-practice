<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return view('index', compact('todos'));
    }

    public function store(TodoRequest $request)
    {
        $todo = $request->only(['content']);
        Todo::create($todo);
        return redirect('/')->with('success','Todoを作成しました');
    }

}
