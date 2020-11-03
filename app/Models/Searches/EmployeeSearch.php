<?php


namespace App\Models\Searches;

use App\Helpers\DateHelper;
use App\Models\Employee;

class EmployeeSearch
{
    public static function searching($id = NULL, $name = NULL, $salary = NULL, $status = NULL, $currency_id = NULL, $position_id = NULL, $created_at = NULL)
    {
        if ($id !== NULL || $name !== NULL || $salary !== NULL || $status !== NULL || $currency_id !== NULL || $position_id !== NULL || $created_at !== NULL) {
            $query = Employee::query();

            if (!is_null($id)) {
                $query->where('id', $id);
            }
            if (!is_null($name)) {
                $query->where('name', $name);
            }
            if (!is_null($salary)) {
                $query->where('salary', $salary);
            }
            if (!is_null($status)) {
                $query->where('status', $status);
            }
            if (!is_null($currency_id)) {
                $query->where('currency_id', $currency_id);
            }
            if (!is_null($position_id)) {
                $query->where('position_id', $position_id);
            }
            if (!is_null($created_at)) {
                $dateRangeInTimestamp = DateHelper::dateRangeToTimestampRange($created_at);
                $query->where('created_at','>=', $dateRangeInTimestamp['start']);
                $query->where('created_at','<=', $dateRangeInTimestamp['end']);
            }

            return $query->get();
        }else{
            return Employee::all();
        }
    }
}
