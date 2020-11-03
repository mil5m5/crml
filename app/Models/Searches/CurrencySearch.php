<?php


namespace App\Models\Searches;

use App\Models\Currency;

class CurrencySearch
{
    public static function searching($id = NULL, $currency = NULL, $symbol = NULL)
    {
        if ($id !== NULL || $currency !== NULL || $symbol !== NULL) {
            $query = Currency::query();

            if (!is_null($id)) {
                $query->where('id', $id);
            }
            if (!is_null($currency)) {
                $query->where('currency', $currency);
            }
            if (!is_null($symbol)) {
                $query->where('symbol', $symbol);
            }

            return $query->get();
        }else{
            return Currency::all();
        }
    }
}
