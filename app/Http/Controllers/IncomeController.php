<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Searches\IncomeSearch;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = Income::all();
        if (empty($request)) {
            $id = $request->get('id');
            $date = strtotime($request->get('date'));
            $amount = $request->get('amount');
            $notes = $request->get('notes');
            $currency_id = $request->get('currency_id');
            $project_id = $request->get('project_id');
            $model = IncomeSearch::searching($id, $date, $amount, $notes, $currency_id, $project_id);
        }

        return view('income.index', [
            'models' => $model
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id = NULL)
    {
        return view('income.create', [
            'project_id' => $project_id
        ]);
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
            'project_id' => ['exists:App\Models\Project,id', 'required'],
            'amount' => ['required', 'numeric'],
        ]);
        $income = new Income();
        $income->date = strtotime($request->input('date'));
        $income->notes = $request->input('notes');
        $income->amount = $request->input('amount');
        $income->currency_id = $request->input('currency_id');
        $income->project_id = $request->input('project_id');
        $income->updated_at = time();
        $income->created_at = time();
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
            'project_id' => ['exists:App\Models\Project,id', 'required'],
            'amount' => ['required'],
        ]);
        $incomeModel = Income::find($income);
        $incomeModel->date = strtotime($request->input('date'));
        $incomeModel->notes = $request->input('notes');
        $incomeModel->amount = $request->input('amount');
        $incomeModel->currency_id = $request->input('currency_id');
        $incomeModel->project_id = $request->input('project_id');
        $incomeModel->updated_at = time();
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
