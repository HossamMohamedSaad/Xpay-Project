<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class income_source extends Model
{
    protected $guarded = ['id'];
    protected $table = 'income_sources';
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    public function monthly_income_source()
    {
        return $this->hasMany(monthly_income_source::class);
    }
    public function incomes()
    {
        return $this->hasMany(income::class);
    }
    public function monthly_reports()
    {
        return $this->hasMany(monthly_report::class, 'top_income_source_id');
    }

}
