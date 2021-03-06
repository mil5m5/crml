<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Searches\ProjectSearch;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $id = $request->input('id');
        $name = $request->input('name');
        $client_id = $request->input('client_id');
        $salary_type = $request->input('salary_type');
        $salary_rate = $request->input('salary_rate');
        $status = $request->input('status');
        $currency_id = $request->input('currency_id');
        $created_at = $request->input('created_at');
        $model = ProjectSearch::searching($id, $name, $client_id, $salary_type, $salary_rate, $status, $currency_id, $created_at);
        return view('project.index', [
            'models' => $model
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);
        $project = new Project();
        $project->name = $request->input('name');
        $project->client_id = $request->input('client_id');
        $project->salary_type = $request->input('salary_type');
        $project->salary_rate = $request->input('salary_rate');
        if ($request->input('status') == Project::STATUS_PAUSED) {
            $project->paused_at = time();
        }elseif ($request->input('status') == Project::STATUS_FINISHED) {
            $project->finished_at = time();
        }
        $project->status = $request->input('status');
        $project->currency_id = $request->input('currency_id');
        $project->updated_at = time();
        $project->created_at = time();
        if ($project->save()) {
            return redirect()->route('project.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($project)
    {
        $model = Project::find($project);

        return view('project.view', [
            'model' => $model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($project)
    {
        $model = Project::find($project);
        return view('project.update', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $project)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);
        $projectModel = Project::find($project);
        $projectModel->name = $request->input('name');
        $projectModel->client_id = $request->input('client_id');
        $projectModel->salary_type = $request->input('salary_type');
        $project->salary_rate = $request->input('salary_rate');
        if ($request->input('status') == Project::STATUS_PAUSED) {
            $projectModel->paused_at = time();
        }elseif ($request->input('status') == Project::STATUS_FINISHED) {
            $projectModel->finished_at = time();
        }
        $projectModel->status = $request->input('status');
        $projectModel->currency_id = $request->input('currency_id');
        $projectModel->updated_at = time();
        if ($projectModel->save()) {
            return redirect()->route('project.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($project)
    {
        if(Project::find($project)->delete()) {
            return redirect()->route('project.index');
        }
    }
}
