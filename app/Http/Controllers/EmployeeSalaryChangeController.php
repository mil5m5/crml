<?php

namespace App\Http\Controllers;

use App\Models\EmployeeSalaryChange;
use App\Models\Searches\EmployeeSalaryChangeSearch;
use Illuminate\Http\Request;

class EmployeeSalaryChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->get('id');
        $old_salary = $request->get('old_salary');
        $new_salary = $request->get('new_salary');
        $employee_id = $request->get('employee_id');
        $created_at = $request->get('created_at');
        $model = EmployeeSalaryChangeSearch::searching($id, $old_salary, $new_salary, $employee_id, $created_at);
        return view('employee-salary-change.index', [
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
        return view('employee-salary-change.create');
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
            'employee_id' => ['exists:App\Models\Employee,id', 'required'],
            'old_salary' => ['required'],
            'new_salary' => ['required'],
        ]);
        $employeeSalaryChanges = new EmployeeSalaryChange();
        $employeeSalaryChanges->old_salary = $request->input('old_salary');
        $employeeSalaryChanges->new_salary = $request->input('new_salary');
        $employeeSalaryChanges->comment = $request->input('comment');
        $employeeSalaryChanges->employee_id = $request->input('employee_id');
        $employeeSalaryChanges->updated_at = time();
        $employeeSalaryChanges->created_at = time();
        if ($employeeSalaryChanges->save()) {
            return redirect()->route('employee-salary-change.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeSalaryChange  $employeeSalaryChanges
     * @return \Illuminate\Http\Response
     */
    public function show($employeeSalaryChanges)
    {
        $model = EmployeeSalaryChange::find($employeeSalaryChanges);
        return view('employee-salary-change.view', [
            'model' => $model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeSalaryChange  $employeeSalaryChanges
     * @return \Illuminate\Http\Response
     */
    public function edit($employeeSalaryChanges)
    {
        $model = EmployeeSalaryChange::find($employeeSalaryChanges);
        return view('employee-salary-change.update', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeSalaryChange  $employeeSalaryChanges
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employeeSalaryChanges)
    {
        $request->validate([
            'employee_id' => ['exists:App\Models\Employee,id', 'required'],
            'old_salary' => ['required'],
            'new_salary' => ['required'],
        ]);
        $employeeSalaryChangesModel = new EmployeeSalaryChange();
        $employeeSalaryChangesModel->old_salary = $request->input('old_salary');
        $employeeSalaryChangesModel->new_salary = $request->input('new_salary');
        $employeeSalaryChangesModel->comment = $request->input('comment');
        $employeeSalaryChangesModel->employee_id = $request->input('employee_id');
        $employeeSalaryChangesModel->updated_at = time();
        if ($employeeSalaryChangesModel->save()) {
            return redirect()->route('employee-salary-change.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeSalaryChange  $employeeSalaryChanges
     * @return \Illuminate\Http\Response
     */
    public function destroy($employeeSalaryChanges)
    {
        if(EmployeeSalaryChange::find($employeeSalaryChanges)->delete()) {
            return redirect()->route('employee-salary-change.index');
        }
    }
}
