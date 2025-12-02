<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class monthly_income_source extends Model
{
    protected $guarded = ['id'];
    protected $table = 'monthly_income_sources';
    public function income_source()
    {
        return $this->belongsTo(income_source::class, 'income_source_id');
    }
    public function client()
    {
        return $this->belongsTo(client::class, 'income_source_id');
    }

}
