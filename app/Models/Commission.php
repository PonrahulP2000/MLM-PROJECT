<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Commission extends Model
{
    protected $fillable = ['user_id', 'referrer_id', 'amount', 'type', 'level', 'distribution_date'];
    protected $dates = ['distribution_date'];

    public function getDistributionDateAttribute($value)
    {
        return Carbon::parse($value);
    }
}
