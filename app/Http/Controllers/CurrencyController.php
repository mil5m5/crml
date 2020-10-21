<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Searches\ClientSearch;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->get('id');
        $currency = $request->get('currency');
        $symbol = $request->get('symbol');
        $model = CurrencySearch::searching($id, $currency, $symbol);
        return view('currency.index', [
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
        return view('currency.create');
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
            'currency' => ['required', 'string']
        ]);
        $currency = new Currency();
        $currency->currency = $request->input('currency');
        $currency->symbol = $request->input('symbol');
        if ($currency->save()) {
            return redirect()->route('currency.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show($currency)
    {
        $model = Currency::find($currency);
        return view('currency.view', [
            'model' => $model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit($currency)
    {
        $model = Currency::find($currency);
        return view('currency.update', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $currency)
    {
        $request->validate([
            'currency' => ['required', 'string']
        ]);
        $currencyModel = Currency::find($currency);
        $currencyModel->currency = $request->input('currency');
        $currencyModel->symbol = $request->input('symbol');
        if ($currencyModel->save()) {
            return redirect()->route('currency.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy($currency)
    {
        if(Currency::find($currency)->delete()) {
            return redirect()->route('currency.index');
        }
    }
}
