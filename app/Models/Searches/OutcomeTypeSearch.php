<?php


namespace App\Models\Searches;

use App\Models\OutcomeType;

class OutcomeTypeSearch
{
    public static function searching($id = NULL, $name = NULL)
    {
        if ($id !== NULL || $name !== NULL) {
            $query = OutcomeType::query();

            if (!is_null($id)) {
                $query->where('id', $id);
            }
            if (!is_null($name)) {
                $query->where('name', $name);
            }

            return $query->get();
        }else{
            return OutcomeType::all();
        }
    }
}
