<?php

namespace App\Models\Searches;

use App\Helpers\DateHelper;
use App\Models\EmployeeSalaryChange;

class EmployeeSalaryChangeSearch
{
    public static function searching($id = NULL, $old_salary = NULL, $new_salary = NULL, $employee_id = NULL, $created_at = NULL)
    {
        if ($id !== NULL || $old_salary !== NULL || $new_salary !== NULL || $employee_id !== NULL || $created_at !== NULL) {
            $query = EmployeeSalaryChange::query();

            if (!is_null($id)) {
                $query->where('id', $id);
            }
            if (!is_null($old_salary)) {
                $query->where('old_salary', $old_salary);
            }
            if (!is_null($new_salary)) {
                $query->where('new_salary', $new_salary);
            }
            if (!is_null($employee_id)) {
                $query->where('employee_id', $employee_id);
            }
            if (!is_null($created_at)) {
                $dateRangeInTimestamp = DateHelper::dateRangeToTimestampRange($created_at);
                $query->where('created_at','>=', $dateRangeInTimestamp['start']);
                $query->where('created_at','<=', $dateRangeInTimestamp['end']);
            }
            return $query->get();
        }else{
            return EmployeeSalaryChange::all();
        }
    }
}
