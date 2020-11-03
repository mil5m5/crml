<?php


namespace App\Models\Searches;

use App\Helpers\DateHelper;
use App\Models\Project;

class ProjectSearch
{
    public static function searching($id = NULL, $name = NULL, $client_id = NULL, $salary_type = NULL, $salary_rate = NULL, $status = NULL, $currency_id = NULL, $created_at = NULL)
    {
        if ($id !== NULL || $name !== NULL || $client_id !== NULL || $salary_type !== NULL || $salary_rate !== NULL || $status !== NULL || $currency_id !== NULL || $created_at !== NULL) {
            $query = Project::query();

            if (!is_null($id)) {
                $query->where('id', $id);
            }
            if (!is_null($name)) {
                $query->where('name', $name);
            }
            if (!is_null($client_id)) {
                $query->where('client_id', $client_id);
            }
            if (!is_null($salary_type)) {
                $query->where('salary_type', $salary_type);
            }
            if (!is_null($salary_rate)) {
                $query->where('salary_rate', $salary_rate);
            }
            if (!is_null($status)) {
                $query->where('status', $status);
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
            return Project::all();
        }
    }
}
