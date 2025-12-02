<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subscribtion extends Model
{
    protected $guarded = ['id'];
    protected $table = 'subscribtions';
    public function plan()
    {
        return $this->belongsTo(Plan::class, 'plan_id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
