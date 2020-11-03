<?php


namespace App\Models\Searches;

use App\Models\ProjectCredentialType;

class ProjectCredentialTypeSearch
{
    public static function searching($id = NULL, $name = NULL)
    {
        if ($id !== NULL || $name !== NULL) {
            $query = ProjectCredentialType::query();

            if (!is_null($id)) {
                $query->where('id', $id);
            }
            if (!is_null($name)) {
                $query->where('name', $name);
            }

            return $query->get();
        }else{
            return ProjectCredentialType::all();
        }
    }
}
