<?php

namespace App\Http\Controllers;

use App\Models\ProjectRateChange;
use Illuminate\Http\Request;

class ProjectRateChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = ProjectRateChange::all();
        $old_rate = $request->get('old_rate');
        $new_rate = $request->get('new_rate');
        $comment = $request->get('comment');
        $project_id = $request->get('project_id');
        $id = $request->get('id');
        $model = ProjectRateChangeSearch::searching($old_rate, $new_rate, $comment, $project_id, $id);

        return view('project-rate-change.index', [
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
        return view('project-rate-change.create');
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
            'old_rate' => ['required'],
            'new_rate' => ['required'],
            'project_id' => ['required'],
        ]);
        $projectRateChange = new ProjectRateChange();
        $projectRateChange->old_rate = $request->input('old_rate');
        $projectRateChange->new_rate = $request->input('new_rate');
        $projectRateChange->comment = $request->input('comment');
        $projectRateChange->project_id = $request->input('project_id');
        if ($projectRateChange->save()) {
            return redirect()->route('project-rate-change.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectRateChange  $projectRateChanges
     * @return \Illuminate\Http\Response
     */
    public function show($projectRateChanges)
    {
        $model = ProjectRateChange::find($projectRateChanges);
        return view('project-rate-change.view', [
            'model' => $model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectRateChange  $projectRateChanges
     * @return \Illuminate\Http\Response
     */
    public function edit($projectRateChanges)
    {
        $model = ProjectRateChange::find($projectRateChanges);
        return view('project-rate-change.update', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectRateChange  $projectRateChanges
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $projectRateChanges)
    {
        $request->validate([
            'old_rate' => ['required'],
            'new_rate' => ['required'],
            'project_id' => ['required'],
        ]);
        $projectRateChangeModel = ProjectRateChange::find($projectRateChanges);
        $projectRateChangeModel->old_rate = $request->input('old_rate');
        $projectRateChangeModel->new_rate = $request->input('new_rate');
        $projectRateChangeModel->comment = $request->input('comment');
        $projectRateChangeModel->project_id = $request->input('project_id');
        if ($projectRateChangeModel->save()) {
            return redirect()->route('project-rate-change.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectRateChange  $projectRateChanges
     * @return \Illuminate\Http\Response
     */
    public function destroy($projectRateChanges)
    {
        if(ProjectRateChange::find($projectRateChanges)->delete()) {
            return redirect()->route('project-rate-change.index');
        }
    }
}
