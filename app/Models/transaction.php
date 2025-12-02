<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    protected $table = 'transactions';
    protected $guarded = ['id'];
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }   
    public function from_account()
    {
        return $this->belongsTo(account::class, 'from_account');
    }
    public function to_account()
    {
        return $this->belongsTo(account::class, 'to_account');
    }
}
