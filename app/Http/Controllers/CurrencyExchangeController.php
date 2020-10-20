<?php

namespace App\Http\Controllers;

use App\Models\CurrencyExchange;
use Illuminate\Http\Request;

class CurrencyExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = CurrencyExchange::all();
        return view('currency-exchange.index', [
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
        return view('currency-exchange.create');
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
            'from_currency_id' => ['exists:App\Models\Currency,id', 'required'],
            'to_currency_id' => ['exists:App\Models\Currency,id', 'required'],
            'amount' => ['numeric', 'required'],
            'rate' => 'numeric',
            'exchanged' => 'numeric',
        ]);
        $currencyExchange = new CurrencyExchange();
        $currencyExchange->from_currency_id = $request->input('from_currency_id');
        $currencyExchange->to_currency_id = $request->input('to_currency_id');
        $currencyExchange->amount = $request->input('amount');
        $currencyExchange->rate = $request->input('rate');
        $currencyExchange->exchanged = $request->input('exchanged');
        $currencyExchange->date = $request->input('date');
        if ($currencyExchange->save()) {
            return redirect()->route('currency-exchange.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CurrencyExchange  $currencyExchange
     * @return \Illuminate\Http\Response
     */
    public function show($currencyExchange)
    {
        $model = CurrencyExchange::find($currencyExchange);
        return view('currency-exchange.view', [
            'model' => $model
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CurrencyExchange  $currencyExchange
     * @return \Illuminate\Http\Response
     */
    public function edit($currencyExchange)
    {
        $model = CurrencyExchange::find($currencyExchange);
        return view('currency-exchange.update', ['model' => $model]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CurrencyExchange  $currencyExchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $currencyExchange)
    {
        $request->validate([
            'from_currency_id' => ['exists:App\Models\Currency,id', 'required'],
            'to_currency_id' => ['exists:App\Models\Currency,id', 'required'],
            'amount' => ['numeric', 'required'],
            'rate' => 'numeric',
            'exchanged' => 'numeric',
        ]);
        $currencyExchangeModel = CurrencyExchange::find($currencyExchange);
        $currencyExchangeModel->from_currency_id = $request->input('from_currency_id');
        $currencyExchangeModel->to_currency_id = $request->input('to_currency_id');
        $currencyExchangeModel->amount = $request->input('amount');
        $currencyExchangeModel->rate = $request->input('rate');
        $currencyExchangeModel->exchanged = $request->input('exchanged');
        $currencyExchangeModel->date = $request->input('date');
        if ($currencyExchangeModel->save()) {
            return redirect()->route('currency-exchange.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CurrencyExchange  $currencyExchange
     * @return \Illuminate\Http\Response
     */
    public function destroy($currencyExchange)
    {
        if(CurrencyExchange::find($currencyExchange)->delete()) {
            return redirect()->route('currency-exchange.index');
        }
    }
}
