<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = [
            collect(["id" => 1, "name" => "Task", "is_done" => false]),
            collect(["id" => 2, "name" => "Play CS:Go", "is_done" => false]),
            collect(["id" => 3, "name" => "Finish Book", "is_done" => true])
        ];

        $todos = collect($todos);

        return view('index', compact('todos'));
    }

    public function save(Request $request)
    {
        dd($request->all());
    }

    public function markDone($id)
    {
        dd("Marked done {$id}");
    }

    public function delete($id)
    {
        dd("Deleted {$id}");
    }
}
