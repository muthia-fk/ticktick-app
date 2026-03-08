<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // READ: tampilkan semua task
    public function index() {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    // CREATE: form tambah task
    public function create() {
        return view('tasks.create');
    }

    // STORE: simpan task baru
    public function store(Request $request) {
        Task::create($request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]));
        return redirect()->route('tasks.index')->with('success','Task berhasil ditambahkan!');
    }

    // EDIT: form edit task
    public function edit(Task $task) {
        return view('tasks.edit', compact('task'));
    }

    // UPDATE: simpan perubahan task
    public function update(Request $request, Task $task) {
        $task->update($request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]));
        return redirect()->route('tasks.index')->with('success','Task berhasil diupdate!');
    }

    // DESTROY: hapus task
    public function destroy(Task $task) {
        $task->delete();
        return redirect()->route('tasks.index')->with('success','Task berhasil dihapus!');
    }
}
