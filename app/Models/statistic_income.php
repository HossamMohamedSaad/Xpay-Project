<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class statistic_income extends Model
{
    protected $fillable = [
        'client_id',
        'income_source_id',
        'month',
        'year',
        'total_income',
    ];
    protected $table = 'statistic_incomes';

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function income_source()
    {
        return $this->belongsTo(income_source::class);
    }
    

}
