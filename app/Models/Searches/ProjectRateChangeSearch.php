<?php


namespace App\Models\Searches;

use App\Helpers\DateHelper;
use App\Models\ProjectRateChange;

class ProjectRateChangeSearch
{
    public static function searching($id = NULL, $old_rate = NULL, $new_rate = NULL, $project_id = NULL, $created_at = NULL)
    {
        if ($id !== NULL || $old_rate !== NULL || $new_rate !== NULL || $project_id !== NULL || $created_at !== NULL) {
            $query = ProjectRateChange::query();

            if (!is_null($id)) {
                $query->where('id', $id);
            }
            if (!is_null($old_rate)) {
                $query->where('old_rate', $old_rate);
            }
            if (!is_null($new_rate)) {
                $query->where('new_rate', $new_rate);
            }
            if (!is_null($project_id)) {
                $query->where('project_id', $project_id);
            }
            if (!is_null($created_at)) {
                $dateRangeInTimestamp = DateHelper::dateRangeToTimestampRange($created_at);
                $query->where('created_at','>=', $dateRangeInTimestamp['start']);
                $query->where('created_at','<=', $dateRangeInTimestamp['end']);
            }
            return $query->get();
        }else{
            return ProjectRateChange::all();
        }
    }
}
