<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'amount', 'expense_category_id', 'entry_date'
    ];

    protected $dates = [
        'entry_date'
    ];

    public function category()
    {
        return $this->belongsTo(ExpenseCategory::class);
    }
}
