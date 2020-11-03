<?php

namespace App\Http\Controllers;

use App\Http\Requests\OutcomeRequest;
use App\Models\Outcome;
use App\Models\Searches\OutcomeSearch;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->get('id');
        $type = $request->get('type');
        $date = strtotime($request->get('date'));
        $amount = $request->get('amount');
        $is_paid = $request->get('is_paid') == 'on' ? 1 : 0;
        $currency_id = $request->get('currency_id');
        $model = OutcomeSearch::searching($id, $date, $amount, $currency_id, $type, $is_paid);

        return view('outcome.index', [
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
        return view('outcome.create');
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
            'amount' => ['required'],
            'type' => ['required'],
        ]);
        $outcome = new Outcome();
        $outcome->type = $request->input('type');
        $outcome->date = strtotime($request->input('date'));
        $outcome->notes = $request->input('notes');
        $outcome->amount = $request->input('amount');
        $outcome->is_paid = $request->input('is_paid') == 'on' ? 1 : 0;
        $outcome->paid_at = $request->input('paid_at');
        $outcome->currency_id = $request->input('currency_id');
        $outcome->updated_at = time();
        $outcome->created_at = time();
        if ($outcome->save()) {
            return redirect()->route('outcome.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function show($outcome)
    {
        $model = Outcome::find($outcome);
        return view('outcome.view', [
            'model' => $model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function edit($outcome)
    {
        $model = Outcome::find($outcome);
        return view('outcome.update', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $outcome)
    {
        $request->validate([
            'currency_id' => ['exists:App\Models\Currency,id', 'required'],
            'amount' => ['required'],
            'type' => ['required'],

        ]);
        $outcomeModel = Outcome::find($outcome);
        $outcomeModel->type = $request->input('type');
        $outcomeModel->date = strtotime($request->input('date'));
        $outcomeModel->notes = $request->input('notes');
        $outcomeModel->amount = $request->input('amount');
        $outcomeModel->is_paid = $request->input('is_paid') == 'on' ? 1 : 0;
        $outcomeModel->paid_at = $request->input('paid_at');
        $outcomeModel->currency_id = $request->input('currency_id');
        $outcomeModel->updated_at = time();
        if ($outcomeModel->save()) {
            return redirect()->route('outcome.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Outcome  $outcome
     * @return \Illuminate\Http\Response
     */
    public function destroy($outcome)
    {
        if(Outcome::find($outcome)->delete()) {
            return redirect()->route('outcome.index');
        }
    }
}
