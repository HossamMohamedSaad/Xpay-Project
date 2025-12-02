<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class expenses extends Model
{
    protected $guarded = ['id'];
    protected $table = 'expenses';
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function expense_category()
    {
        return $this->belongsTo(expense_category::class, 'expense_category_id');
    }
    public function account()
    {
        return $this->belongsTo(account::class, 'account_id');
    }

}
