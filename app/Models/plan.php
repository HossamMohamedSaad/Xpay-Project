<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    protected $guarded = ['id'];
    protected $table = 'plans';
    public function subscribption()
    {
        return $this->hasMany(Subscribtion::class, 'plan_id');
    }
    

}
