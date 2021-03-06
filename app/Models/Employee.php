<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = false;

    const STATUS_SUSPENDED = 0;
    const STATUS_WORKING = 1;
    const STATUS_VACATION = 2;

    public static function getStatuses()
    {
        return [
            self::STATUS_WORKING => 'Working',
            self::STATUS_SUSPENDED => 'Suspended',
            self::STATUS_VACATION => 'Vacation'
        ];
    }

    public function currency()
    {
        return $this->belongsTo('App\Models\Currency');
    }

    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }

    public static function getEmployeesList()
    {
        return DB::table('employees')->pluck('name', 'id');

    }

    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }
}
