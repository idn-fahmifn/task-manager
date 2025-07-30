<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function admin()
    {
        return Inertia::render('Admin/Dashboard');
    }

    public function team()
    {
        return Inertia::render('Team/Dashboard');
    }

    public function user()
    {
        $saya = Auth::user()->id;

        $projectSaya = Project::where('user_id', $saya)->count();
        $inProgress = Project::where('user_id', $saya)->where('status', 'in progress')->count();
        $hold = Project::where('user_id', $saya)->where('status', 'hold')->count();
        $done = Project::where('user_id', $saya)->where('status', 'done')->count();

        $project = Project::where('user_id', $saya)->get();
        
        return Inertia::render('User/Dashboard', [
            'projects' => $project,
            'project_saya' => $projectSaya,
            'in_progress' => $inProgress,
            'hold' => $hold,
            'done' => $done,
        ]);
    }
}
