<?php

namespace App\Http\Controllers;

use App\Models\ProjectCredential;
use App\Models\Searches\ProjectCredentialSearch;
use Illuminate\Http\Request;

class ProjectCredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->get('id');
        $project_id = $request->get('project_id');
        $credential_type_id = $request->get('credential_type_id');
        $created_at = $request->get('created_at');
        $model = ProjectCredentialSearch::searching($id, $project_id, $credential_type_id, $created_at);
        return view('project-credential.index', [
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
        return view('project-credential.create');
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
            'project_id' => ['required'],
            'credential_type_id' => ['required']
        ]);
        $projectCredential = new ProjectCredential();
        $projectCredential->value = $request->input('value');
        $projectCredential->project_id = $request->input('project_id');
        $projectCredential->credential_type_id = $request->input('credential_type_id');
        $projectCredential->updated_at = time();
        $projectCredential->created_at = time();
        if ($projectCredential->save()) {
            return redirect()->route('project-credential.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectCredential  $projectCredential
     * @return \Illuminate\Http\Response
     */
    public function show($projectCredential)
    {
        $model = ProjectCredential::find($projectCredential);
        return view('project-credential.view', [
            'model' => $model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectCredential  $projectCredential
     * @return \Illuminate\Http\Response
     */
    public function edit($projectCredential)
    {
        $model = ProjectCredential::find($projectCredential);
        return view('project-credential.update', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectCredential  $projectCredential
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $projectCredential)
    {
        $request->validate([
            'currency' => ['required', 'string']
        ]);
        $projectCredentialModel = ProjectCredential::find($projectCredential);
        $projectCredentialModel->value = $request->input('value');
        $projectCredentialModel->project_id = $request->input('project_id');
        $projectCredentialModel->credential_type_id = $request->input('credential_type_id');
        $projectCredentialModel->updated_at = time();
        if ($projectCredentialModel->save()) {
            return redirect()->route('project-credential.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectCredential  $projectCredential
     * @return \Illuminate\Http\Response
     */
    public function destroy($projectCredential)
    {
        if(ProjectCredential::find($projectCredential)->delete()) {
            return redirect()->route('project-credential.index');
        }
    }
}
