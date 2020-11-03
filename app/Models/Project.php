<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Project extends Model
{
    use HasFactory;
    public $timestamps = false;

    const STATUS_FINISHED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_PAUSED = 2;

    const SALARY_HOURLY = 1;
    const SALARY_DAILY = 2;
    const SALARY_WEEKLY = 3;
    const SALARY_MONTHLY = 4;
    const SALARY_MILESTONE = 5;

    public static function getStatusNames()
    {
        return [
            self::STATUS_ACTIVE => 'Active',
            self::STATUS_PAUSED => 'Paused',
            self::STATUS_FINISHED => 'Finished'
        ];
    }

    /**
     * @return array
     */
    public static function getSalaryTypes()
    {
        return [
            self::SALARY_HOURLY => 'Hourly',
            self::SALARY_DAILY => 'Daily',
            self::SALARY_WEEKLY => 'Weekly',
            self::SALARY_MONTHLY => 'Monthly',
            self::SALARY_MILESTONE => 'By Milestone',
        ];
    }

    public static function getProjectsList()
    {
        return DB::table('projects')->pluck('name', 'id');

    }

    public function currency()
    {
        return $this->belongsTo('App\Models\Currency');
    }

    public function projectCredentials()
    {
        return $this->hasMany('App\Models\ProjectCredential');
    }

    public function incomes()
    {
        return $this->hasMany('App\Models\Income');
    }

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
