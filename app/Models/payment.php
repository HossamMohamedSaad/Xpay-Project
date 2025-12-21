<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    protected $guarded = ['id'];
    protected $casts = [
        'success' => 'boolean',
        'raw_callback' => 'array',
    ];
    
    public function client()
    {
        return $this->belongsTo(client::class);
    }

    public function plan()
    {
        return $this->belongsTo(plan::class);
    }
}
