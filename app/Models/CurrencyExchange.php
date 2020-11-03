<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurrencyExchange extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function fromCurrency()
    {
        return $this->belongsTo('App\Models\Currency');
    }

    public function toCurrency()
    {
        return $this->belongsTo('App\Models\Currency');
    }
}
