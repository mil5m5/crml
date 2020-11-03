<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ClientSource extends Model
{
    use HasFactory;
    public $timestamps = false;
    public static function clientSourceList()
    {
        return DB::table('client_sources')->pluck('name', 'id');
    }
}
