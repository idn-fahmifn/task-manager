<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TaskController extends Controller
{

    public function showProject($slug)
    {

        $project = Project::where('slug', $slug)->first();

        $task = Task::where('project_id', $project->id)->get()->map(function ($task) {
            return [
                'id' => $task->id,
                'task_name' => $task->task_name,
                // Tambahkan properti baru 'created_ago' yang sudah diformat
                'created_ago' => $task->created_at->diffForHumans(),
            ];
        });


        if ($project === null) { // not found
            return back()->with('error', 'Alamat tidak ditemukan');
        }

        return Inertia::render('Admin/Project/Detail', [
            'project' => $project,
            'created' => $project->created_at->diffForHumans(),
            'user' => $project->user,
            'task' => $task,

        ]);
    }

    public function store(Request $request, $param)
    {
        $request->validate([
            'task_name' => ['string', 'required', 'min:4', 'max:50']
        ]);

        Task::create([
            'project_id' => $param,
            'task_name' => $request->input('task_name'),
            'description' => $request->input('description'),
        ]);
        return back()->with('success', 'Berhasil menambahkan tugas');
    }
}
