<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    use HasFactory;
    protected $guarded = [];

    const STATUS_FINISHED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_PAUSED = 2;

    public static function getStatusNames()
    {
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_PAUSED => 'Paused',
            self::STATUS_FINISHED => 'Finished'
        ];
    }

    public function clientSource()
    {
        return $this->belongsTo('App\Models\ClientSource');
    }

    public static function getClientsList()
    {
        return DB::table('clients')->pluck('name', 'id');

    }
}
