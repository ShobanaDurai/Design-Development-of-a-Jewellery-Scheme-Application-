<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WealthTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_id',
        'amount',
        'weight',
        'date',
        'time'
    ];

    protected $table = 'wealthtransaction';

    public function registration()
    {
        return $this->belongsTo(WealthTreasureRegistration::class, 'user_id', 'user_id');
    }
}
