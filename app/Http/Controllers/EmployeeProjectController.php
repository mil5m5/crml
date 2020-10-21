<?php

namespace App\Http\Controllers;

use App\Models\EmployeeProject;
use Illuminate\Http\Request;

class EmployeeProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = EmployeeProject::all();

        return view('employee-project.index', [
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
        return view('employee-project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeProject  $employeeProject
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeProject $employeeProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeProject  $employeeProject
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeProject $employeeProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeProject  $employeeProject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeProject $employeeProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeProject  $employeeProject
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeProject $employeeProject)
    {
        //
    }
}
