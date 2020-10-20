<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Currency extends Model
{
    use HasFactory;
    public $timestamps = false;

    public static function getCurrenciesList()
    {
        return DB::table('currencies')->pluck('currency', 'id');
    }
}
