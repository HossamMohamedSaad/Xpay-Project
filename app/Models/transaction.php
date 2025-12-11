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
    public function from()
    {
        return $this->belongsTo(account::class, 'from_account');
    }
    public function to()
    {
        return $this->belongsTo(account::class, 'to_account');
    }
}
