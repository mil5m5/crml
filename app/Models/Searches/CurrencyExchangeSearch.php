<?php


namespace App\Models\Searches;

use App\Helpers\DateHelper;
use App\Models\CurrencyExchange;

class CurrencyExchangeSearch
{
    public static function searching($id = NULL, $from_currency_id = NULL, $to_currency_id = NULL, $amount = NULL, $rate = NULL, $exchanged = NULL, $date = NULL)
    {
        if ($id !== NULL || $from_currency_id !== NULL || $to_currency_id !== NULL || $amount !== NULL || $rate !== NULL || $exchanged !== NULL || $date !== NULL) {
            $query = CurrencyExchange::query();

            if (!is_null($id)) {
                $query->where('id', $id);
            }
            if (!is_null($from_currency_id)) {
                $query->where('from_currency_id', $from_currency_id);
            }
            if (!is_null($to_currency_id)) {
                $query->where('to_currency_id', $to_currency_id);
            }
            if (!is_null($amount)) {
                $query->where('amount', $amount);
            }
            if (!is_null($rate)) {
                $query->where('rate', $rate);
            }
            if (!is_null($exchanged)) {
                $query->where('exchanged', $exchanged);
            }
            if (!is_null($date)) {
                $dateRangeInTimestamp = DateHelper::dateRangeToTimestampRange($date);
                $query->where('date','>=', $dateRangeInTimestamp['start']);
                $query->where('date','<=', $dateRangeInTimestamp['end']);
            }

            return $query->get();
        }else{
            return CurrencyExchange::all();
        }
    }
}
