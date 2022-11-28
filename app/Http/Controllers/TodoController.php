<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();

        return view('index', compact('todos'));
    }

    public function save(Request $request)
    {
        $newTodo = new Todo();
        $newTodo->title = $request->get('new-todo');
        $newTodo->is_done = 0;

        $infoType = (!$newTodo->save()) ? 'danger' : 'success';
        $infoMsg = (!$newTodo->save()) ? 'Failure on adding todo :(' : 'Todo Added successfully!';

        session()->flash('infoType', $infoType);
        session()->flash('infoMsg', $infoMsg);

        return redirect()->route('todo.index');
    }

    public function markDone(Todo $todo)
    {
        $todo->is_done = 1;
        $todo->updated_at = Carbon::now();

        $status = (!$todo->save()) ? 'danger' : 'success';
        $msg = (!$todo->save()) ? 'Failure in marking as Done!' : 'Marked as Done';

        $msg .= " Reload in 3 sec.";

        return response()->json([
            'respHTML' => $this->responseHtml($status, $msg)
        ]);
    }

    public function delete(Todo $todo)
    {
        $deleteStatus = $todo->delete();
        $status = (!$deleteStatus) ? 'danger' : 'warning';
        $msg = (!$deleteStatus) ? 'Failure in deleting Todo!' : 'Deleted';

        $msg .= " Reload in 3 sec.";

        return response()->json([
            'respHTML' => $this->responseHtml($status, $msg)
        ]);
    }

    function responseHtml($status, $message) {
        return '
            <div class="row mb-2 border border-dark">
                <div class="col bg-'.$status.' text-center">
                    <h3>'.$message.'</h3>
                </div>
            </div>
        ';
    }
}
