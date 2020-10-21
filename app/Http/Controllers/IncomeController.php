<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date = strtotime($request->get('date'));
        $notes = $request->get('notes');
        $amount = $request->get('amount');
        $currency_id = $request->get('currency_id');
        $project_id = $request->get('project_id');
        $model = IncomeSearch::searching($date, $notes, $amount, $currency_id, $project_id);

        return view('income.index', [
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
        return view('income.create');
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
            'currency_id' => ['exists:App\Models\Currency,id', 'required'],
            'amount' => ['required', 'numeric'],
        ]);
        $income = new Income();
        $income->date = strtotime($request->input('date'));
        $income->notes = $request->input('notes');
        $income->amount = $request->input('amount');
        $income->currency_id = $request->input('currency_id');
        $income->project_id = $request->input('project_id');
        if ($income->save()) {
            return redirect()->route('income.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function show($income)
    {
        $model = Income::find($income);
        return view('income.view', [
            'model' => $model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function edit($income)
    {
        $model = Income::find($income);
        return view('income.update', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $income)
    {
        $request->validate([
            'currency_id' => ['exists:App\Models\Currency,id', 'required'],
            'amount' => ['required'],
        ]);
        $incomeModel = Income::find($income);
        $incomeModel->date = strtotime($request->input('date'));
        $incomeModel->notes = $request->input('notes');
        $incomeModel->amount = $request->input('amount');
        $incomeModel->currency_id = $request->input('currency_id');
        $incomeModel->project_id = $request->input('project_id');
        if ($incomeModel->save()) {
            return redirect()->route('income.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy($income)
    {
        if(Income::find($income)->delete()) {
            return redirect()->route('income.index');
        }
    }
}
