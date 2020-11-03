<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Searches\EmployeeSearch;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->get('$id');
        $name = $request->get('name');
        $salary = $request->get('salary');
        $status = $request->get('status');
        $currency_id = $request->get('currency_id');
        $position_id = $request->get('position_id');
        $created_at = $request->get('created_at');
        $model = EmployeeSearch::searching($id, $name, $salary, $status, $currency_id, $position_id, $created_at);

        return view('employee.index', [
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
        return view('employee.create');
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
        $employee = new Employee();
        $employee->name = $request->input('name');
        $employee->surname = $request->input('surname');
        $employee->email = $request->input('email');
        $employee->address = $request->input('address');
        $employee->facebook = $request->input('facebook');
        $employee->telegram = $request->input('telegram');
        $employee->phone = $request->input('phone');
        $employee->salary = $request->input('salary');
        $employee->status = $request->input('status');
        $employee->currency_id = $request->input('currency_id');
        $employee->position_id = $request->input('position_id');
        $employee->updated_at = time();
        $employee->created_at = time();
        if ($employee->save()) {
            return redirect()->route('employee.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show($employee)
    {
        $model = Employee::find($employee);
        return view('employee.view', [
            'model' => $model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit($employee)
    {
        $model = Employee::find($employee);
        return view('employee.update', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $employee)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);
        $employee = Employee::find($employee);
        $employee->name = $request->input('name');
        $employee->surname = $request->input('surname');
        $employee->email = $request->input('email');
        $employee->address = $request->input('address');
        $employee->facebook = $request->input('facebook');
        $employee->telegram = $request->input('telegram');
        $employee->phone = $request->input('phone');
        $employee->salary = $request->input('salary');
        $employee->status = $request->input('status');
        $employee->currency_id = $request->input('currency_id');
        $employee->position_id = $request->input('position_id');
        $employee->updated_at = time();

        if ($employee->save()) {
            return redirect()->route('employee.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy($employee)
    {
        if(Employee::find($employee)->delete()) {
            return redirect()->route('employee.index');
        }
    }
}
