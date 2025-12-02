<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    protected $guarded = ['id'];
    protected $table = 'clients';
    


    public function accounts()
    {
        return $this->hasMany(Account::class, 'client_id');
    }
    public function subscribtion()
    {
        return $this->hasMany(Subscribtion::class, 'client_id');
    }
    public function income_source()
    {
        return $this->hasMany(income_source::class, 'client_id');
    }
    public function monthly_income_source()
    {
        return $this->hasMany(monthly_income_source::class, 'client_id');
    }
    public function income()
    {
        return $this->hasMany(income::class, 'client_id');
    }
    public function expense_category()
    {
        return $this->hasMany(expense_category::class , 'client_id');
    }
    public function monthly_expense_category()
    {
        return $this->hasMany(monthly_expense_category::class, 'client_id');
    }
    public function expenses()
    {
        return $this->hasMany(expenses::class, 'client_id');
    }
    public function monthly_report()
    {
        return $this->hasMany(monthly_report::class, 'client_id');
    }
    public function transaction()
    {
        return $this->hasMany(transaction::class, 'client_id');
    }


}
