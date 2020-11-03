<?php

namespace App\Http\Controllers;

use App\Models\CurrencyExchange;
use App\Models\Searches\ClientSearch;
use App\Models\Searches\CurrencyExchangeSearch;
use Illuminate\Http\Request;

class CurrencyExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = CurrencyExchange::all();
        $id = $request->get('id');
        $from_currency_id = $request->get('from_currency_id');
        $to_currency_id = $request->get('to_currency_id');
        $amount = $request->get('amount');
        $rate = $request->get('rate');
        $exchanged = $request->get('exchanged');
        $date = $request->get('date');
        $model = CurrencyExchangeSearch::searching($id, $from_currency_id, $to_currency_id, $amount, $rate, $exchanged, $date);
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
        $currencyExchange->updated_at = time();
        $currencyExchange->created_at = time();
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
        $currencyExchangeModel->updated_at = time();
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
