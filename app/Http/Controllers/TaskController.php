<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact ('tasks'));
    }

    public function create(){
        return view('tasks.create');
    }



    public function store(Request $request){
        $request->validate([
            'description'=>'required|max:1000',
        ]);
        $task = new Task();
        $task -> description = $request->description;   
        $task->save();
        return redirect()->route('tasks.index')->with('sukses', 'Tugas Berhasil Ditambahkan');
    }

        public function togglecomplete(Task $task){
            $task->is_completed = !$task->iscompleted;
            $task->save();
            return redirect()->route('tasks.index')->with('suskses','Tugas Berhasil di Update');
    }

    public function hapus(Task $task){
        $task->delete();
        return redirect()->route('tasks.index')->with('sukses','Berhasil di Hapus');
    }
}
