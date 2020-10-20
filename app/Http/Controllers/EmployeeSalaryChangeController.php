<?php

namespace App\Http\Controllers;

use App\Models\EmployeeSalaryChanges;
use Illuminate\Http\Request;

class EmployeeSalaryChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = EmployeeSalaryChanges::all();
        return view('employee-salary-changes.index', [
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
        return view('employee-salary-changes.create');
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
     * @param  \App\Models\EmployeeSalaryChanges  $employeeSalaryChanges
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeSalaryChanges $employeeSalaryChanges)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeSalaryChanges  $employeeSalaryChanges
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeSalaryChanges $employeeSalaryChanges)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeSalaryChanges  $employeeSalaryChanges
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeSalaryChanges $employeeSalaryChanges)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeSalaryChanges  $employeeSalaryChanges
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeSalaryChanges $employeeSalaryChanges)
    {
        //
    }
}
