<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = Position::all();
        return view('position.index', [
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
        return view('position.create');
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
        $position = new Position();
        $position->name = $request->input('name');
        $position->min_salary = $request->input('min_salary');
        $position->max_salary = $request->input('max_salary');
        $position->currency_id = $request->input('currency_id');
        if ($position->save()) {
            return redirect()->route('position.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function show($position)
    {
        $model = Position::find($position);
        return view('position.view', [
            'model' => $model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function edit($position)
    {
        $model = Position::find($position);
        return view('position.update', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $position)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);
        $positionModel = Position::find($position);
        $positionModel->min_salary = $request->input('min_salary');
        $positionModel->max_salary = $request->input('max_salary');
        $positionModel->currency_id = $request->input('currency_id');
        if ($positionModel->save()) {
            return redirect()->route('position.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Position  $position
     * @return \Illuminate\Http\Response
     */
    public function destroy($position)
    {
        if(Position::find($position)->delete()) {
            return redirect()->route('position.index');
        }
    }
}
