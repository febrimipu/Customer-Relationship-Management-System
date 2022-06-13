<?php

namespace App\Http\Controllers\Project;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function index(Project $project)
    {
        return view('control-panel.projects.show.tasks', [
            'project' => $project,
            'tasks' => $project
                ->tasks()
                ->with(['project', 'user', 'status'])
                ->latest()
                ->paginate(10),
        ]);
    }
}