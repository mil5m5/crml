<?php


namespace App\Models\Searches;

use App\Helpers\DateHelper;
use App\Models\Outcome;

class OutcomeSearch
{
    public static function searching($id = NULL, $date = NULL, $amount = NULL, $currency_id = NULL, $type = NULL, $is_paid = NULL)
    {
        if ($id !== NULL || $date !== NULL || $amount !== NULL || $currency_id !== NULL || $type !== NULL || $is_paid !== NULL) {
            $query = Outcome::query();

            if (!is_null($id)) {
                $query->where('id', $id);
            }
            if (!is_null($amount)) {
                $query->where('amount', $amount);
            }
            if (!is_null($currency_id)) {
                $query->where('currency_id', $currency_id);
            }
            if (!is_null($type)) {
                $query->where('type', $type);
            }
            if (!is_null($is_paid)) {
                $query->where('is_paid', $is_paid);
            }
            if (!is_null($date)) {
                $dateRangeInTimestamp = DateHelper::dateRangeToTimestampRange($date);
                $query->where('date','>=', $dateRangeInTimestamp['start']);
                $query->where('date','<=', $dateRangeInTimestamp['end']);
            }

            return $query->get();
        }else{
            return Outcome::all();
        }
    }
}
