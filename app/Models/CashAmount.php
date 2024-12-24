<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CashAmount extends Model
{
    /** @use HasFactory<\Database\Factories\CashAmountFactory> */
    use HasFactory;

    protected $fillable = [
        'amount',
        'user_id',
    ];

    public function user(){
        return $this->hasOne(User::class);
    }
}
