<?php

namespace App\Http\Controllers;

use App\Models\ProjectCredentialType;
use App\Models\Searches\ProjectCredentialTypeSearch;
use Illuminate\Http\Request;

class ProjectCredentialTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->get('id');
        $name = $request->get('name');
        $model = ProjectCredentialTypeSearch::searching($id, $name);

        return view('project-credential-type.index', [
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
        return view('project-credential-type.create');
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
        $projectCredentialType = new ProjectCredentialType();
        $projectCredentialType->name = $request->input('name');
        if ($projectCredentialType->save()) {
            return redirect()->route('project-credential-type.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectCredentialType  $projectCredentialType
     * @return \Illuminate\Http\Response
     */
    public function show($projectCredentialType)
    {
        $model = ProjectCredentialType::find($projectCredentialType);
        return view('project-credential-type.view', [
            'model' => $model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectCredentialType  $projectCredentialType
     * @return \Illuminate\Http\Response
     */
    public function edit($projectCredentialType)
    {
        $model = ProjectCredentialType::find($projectCredentialType);
        return view('project-credential-type.update', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectCredentialType  $projectCredentialType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $projectCredentialType)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);
        $projectCredentialType = ProjectCredentialType::find($projectCredentialType);
        $projectCredentialType->name = $request->input('name');
        if ($projectCredentialType->save()) {
            return redirect()->route('project-credential-type.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectCredentialType  $projectCredentialType
     * @return \Illuminate\Http\Response
     */
    public function destroy($projectCredentialType)
    {
        if(ProjectCredentialType::find($projectCredentialType)->delete()) {
            return redirect()->route('project-credential-type.index');
        }
    }
}
