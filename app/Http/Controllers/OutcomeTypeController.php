<?php

namespace App\Http\Controllers;

use App\Models\OutcomeType;
use App\Models\Searches\OutcomeTypeSearch;
use Illuminate\Http\Request;

class OutcomeTypeController extends Controller
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
        $model = OutcomeTypeSearch::searching($id, $name);
        return view('outcome-type.index', [
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
        return view('outcome-type.create');
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
        $outcomeType = new OutcomeType();
        $outcomeType->name = $request->input('name');
        if ($outcomeType->save()) {
            return redirect()->route('outcome-type.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OutcomeType  $outcomeType
     * @return \Illuminate\Http\Response
     */
    public function show($outcomeType)
    {
        $model = OutcomeType::find($outcomeType);
        return view('outcome-type.view', [
            'model' => $model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OutcomeType  $outcomeType
     * @return \Illuminate\Http\Response
     */
    public function edit($outcomeType)
    {
        $model = OutcomeType::find($outcomeType);
        return view('outcome-type.update', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OutcomeType  $outcomeType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OutcomeType $outcomeType)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);
        $outcomeTypeModel = OutcomeType::find($outcomeType);
        $outcomeTypeModel->name = $request->input('name');
        if ($outcomeTypeModel->save()) {
            return redirect()->route('outcome-type.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OutcomeType  $outcomeType
     * @return \Illuminate\Http\Response
     */
    public function destroy($outcomeType)
    {
        if(OutcomeType::find($outcomeType)->delete()) {
            return redirect()->route('outcome-type.index');
        }
    }
}
