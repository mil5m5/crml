<?php


namespace App\Models\Searches;

use App\Helpers\DateHelper;
use App\Models\Income;

class IncomeSearch
{
    public static function searching($id = NULL, $date = NULL, $amount = NULL, $notes = NULL, $currency_id = NULL, $project_id = NULL)
    {
        if ($id !== NULL || $date !== NULL || $amount !== NULL || $currency_id !== NULL || $project_id !== NULL || $notes !== NULL) {
            $query = Income::query();

            if (!is_null($id)) {
                $query->where('id', $id);
            }
            if (!is_null($amount)) {
                $query->where('amount', $amount);
            }
            if (!is_null($currency_id)) {
                $query->where('currency_id', $currency_id);
            }
            if (!is_null($project_id)) {
                $query->where('project_id', $project_id);
            }
            if (!is_null($notes)) {
                $query->where('notes', $notes);
            }
            if (!is_null($date)) {
                $dateRangeInTimestamp = DateHelper::dateRangeToTimestampRange($date);
                $query->where('date','>=', $dateRangeInTimestamp['start']);
                $query->where('date','<=', $dateRangeInTimestamp['end']);
            }
            return $query->get();
        }
        return Income::all();
    }
}
