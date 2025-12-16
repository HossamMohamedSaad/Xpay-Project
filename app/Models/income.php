<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class income extends Model
{
    protected $table = 'incomes';
    protected $guarded = ['id'];
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    
    public function income_source()
    {
        return $this->belongsTo(income_source::class, 'income_source_id');
    }
    public function account()
    {
        return $this->belongsTo(account::class, 'account_id');
    }
    
}
