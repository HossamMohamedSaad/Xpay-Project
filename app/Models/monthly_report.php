<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class monthly_report extends Model
{
    protected $table = 'monthly_reports';
    protected $guarded = ['id'];
    public function client()
    {
        return $this->belongsTo(client::class, 'client_id');
    }
    public function income_source()
    {
        return $this->belongsTo(income_source::class, 'top_income_source_id');
    }
    public function expense_category()
    {
        return $this->belongsTo(expense_category::class, 'top_expense_category_id');
    }

}
