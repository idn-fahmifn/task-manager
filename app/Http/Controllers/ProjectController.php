<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

use function Termwind\render;

class ProjectController extends Controller
{
    public function submitProject(Request $request)
    {
        $request->validate([
            'project_name' => ['required', 'string', 'min:5', 'max:50'],
            'project_desc' => ['required'],
            'priority' => ['required'],
            'due_task' => ['required', 'date'],
            'link' => ['url', 'nullable'],
        ]);


        Project::create([
            'project_name' => $request->input('project_name'),
            'project_desc' => $request->input('project_desc'),
            'priority' => $request->input('priority'),
            'link' => $request->input('link'),
            'due_task' => $request->input('due_task'),
            'user_id' => Auth::user()->id
        ]);

        return back()->with('success', 'Data berhasil disubmit');

        // return $request;
    }

    public function show($slug)
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

        return Inertia::render('User/Project/Detail', [
            'project' => $project,
            'task' => $task,
            'created' => $project->created_at->diffForHumans(),
            'user' => $project->user
        ]);
    }
}
