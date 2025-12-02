<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class monthly_expense_category extends Model
{
    protected $table = 'monthly_expense_categories';
    protected $guarded = ['id'];
    public function expense_category()
    {
        return $this->belongsTo(expense_category::class, 'expense_category_id');
    }
    public function client()
    {
        return $this->belongsTo(client::class, 'client_id');
    }
}
