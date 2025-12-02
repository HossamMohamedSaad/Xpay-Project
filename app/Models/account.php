<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    protected $guarded = ['id'];
    protected $table = 'accounts';
    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
    public function incomes()
    {
        return $this->hasMany(income::class, 'account_id');
    }
    public function expenses()
    {
        return $this->hasMany(expenses::class, 'account_id');
    }
    public function transactions_from()
    {
        return $this->hasMany(transaction::class, 'from_account');
    }
    public function transactions_to()
    {
        return $this->hasMany(transaction::class, 'to_account');
    }

}
