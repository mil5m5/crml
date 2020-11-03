<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function currency()
    {
        return $this->belongsTo('App\Models\Currency');
    }
}
