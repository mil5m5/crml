<?php


namespace App\Models\Searches;

use App\Helpers\DateHelper;
use App\Models\ProjectCredential;

class ProjectCredentialSearch
{
    public static function searching($id = NULL, $project_id = NULL, $credential_type_id = NULL, $created_at = NULL)
    {
        if ($id !== NULL || $project_id !== NULL || $credential_type_id !== NULL || $created_at !== NULL) {
            $query = ProjectCredential::query();

            if (!is_null($id)) {
                $query->where('id', $id);
            }
            if (!is_null($project_id)) {
                $query->where('project_id', $project_id);
            }
            if (!is_null($credential_type_id)) {
                $query->where('credential_type_id', $credential_type_id);
            }
            if (!is_null($created_at)) {
                $dateRangeInTimestamp = DateHelper::dateRangeToTimestampRange($created_at);
                $query->where('created_at','>=', $dateRangeInTimestamp['start']);
                $query->where('created_at','<=', $dateRangeInTimestamp['end']);
            }

            return $query->get();
        }else{
            return ProjectCredential::all();
        }
    }
}
