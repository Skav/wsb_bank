<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionsHistoryAmount extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionsHistoryAmountFactory> */
    use HasFactory;

    protected $fillable = [
        'amount',
        'sender_account_number',
        'receiver_account_number',
        'receiver_fullname',
        'sender_fullname'
    ];
}
