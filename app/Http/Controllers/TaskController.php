<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Project $project)
    {
        $data = request()->validate([
            'name' => 'required',
        ]);

        $data['project_id'] = $project->id;

        Task::create($data);

        return back();
    }

    public function update(Project $project, Task $task)
    {
        $task->update([
            'completed' => request()->has('completed'),
        ]);

        return back();
    }

    public function destroy(Project $project, Task $task)
    {
        $task->delete();

        return redirect('/projects/'.$project->id);
    }
}
