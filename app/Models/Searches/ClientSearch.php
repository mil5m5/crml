<?php


namespace App\Models\Searches;

use App\Helpers\DateHelper;
use App\Models\Client;

class ClientSearch
{
    public static function searching($id = NULL, $name = NULL, $status = NULL, $client_source = NULL, $created_at = NULL)
    {
        if ($id !== NULL || $name !== NULL || $status !== NULL || $client_source !== NULL || $created_at !== NULL) {
            $query = Client::query();

            if (!is_null($id)) {
                $query->where('id', $id);
            }
            if (!is_null($name)) {
                $query->where('name', $name);
            }
            if (!is_null($status)) {
                $query->where('status', $status);
            }
            if (!is_null($client_source)) {
                $query->where('client_source_id', $client_source);
            }
            if (!is_null($created_at)) {
                $dateRangeInTimestamp = DateHelper::dateRangeToTimestampRange($created_at);
                $query->where('created_at','>=', $dateRangeInTimestamp['start']);
                $query->where('created_at','<=', $dateRangeInTimestamp['end']);
            }

            return $query->get();
        }else{
            return Client::all();
        }
    }
}
