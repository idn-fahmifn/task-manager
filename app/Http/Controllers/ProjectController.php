<?php

namespace App\Http\Controllers;

use App\Models\Project;
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
        ]);


        Project::create([
            'project_name' => $request->input('project_name'),
            'project_desc' => $request->input('project_desc'),
            'priority' => $request->input('priority'),
            'due_task' => $request->input('due_task'),
            'user_id' => Auth::user()->id
        ]);

        return back()->with('success', 'Data berhasil disubmit');
    }

    public function show(Project $project)
    {

        $data = Project::findOrFail($project);
        return($data);

        // return Inertia::render('User/Project/Detail', [
        //     'project' => Project::find($project)
        // ]);
    }

}
