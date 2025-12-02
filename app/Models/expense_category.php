<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class expense_category extends Model
{
    protected $guarded = ['id'];
    protected $table = 'expense_categories';
    public function client()
    {
        return $this->belongsTo(client::class, 'client_id');
    }
    public function monthly_expense_category()
    {
        return $this->hasMany(monthly_expense_category::class, 'expense_category_id');
    }
    public function expenses()
    {
        return $this->hasMany(expenses::class, 'expense_category_id');
    }
    public function monthly_report()
    {
        return $this->hasMany(monthly_report::class, 'top_expense_category_id');
    }
}
