<?php


namespace App\Models\Searches;

use App\Helpers\DateHelper;
use App\Models\Position;

class PositionSearch
{
    public static function searching($id = NULL, $name = NULL, $min_salary = NULL, $max_salary = NULL, $currency_id = NULL, $created_at = NULL)
    {
        if ($id !== NULL || $name !== NULL || $min_salary !== NULL || $max_salary !== NULL || $currency_id !== NULL || $created_at !== NULL) {
            $query = Position::query();

            if (!is_null($id)) {
                $query->where('id', $id);
            }
            if (!is_null($name)) {
                $query->where('name', $name);
            }
            if (!is_null($min_salary)) {
                $query->where('min_salary', $min_salary);
            }
            if (!is_null($max_salary)) {
                $query->where('max_salary', $max_salary);
            }
            if (!is_null($currency_id)) {
                $query->where('currency_id', $currency_id);
            }
            if (!is_null($created_at)) {
                $dateRangeInTimestamp = DateHelper::dateRangeToTimestampRange($created_at);
                $query->where('created_at','>=', $dateRangeInTimestamp['start']);
                $query->where('created_at','<=', $dateRangeInTimestamp['end']);
            }

            return $query->get();
        }else{
            return Position::all();
        }
    }
}
