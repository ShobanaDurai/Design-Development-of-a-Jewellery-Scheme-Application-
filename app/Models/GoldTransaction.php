<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoldTransaction extends Model
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

    protected $table = 'goldtransaction';

    public function goldSavingsRegistration()
    {
        return $this->belongsTo(GoldSavingsRegistration::class, 'user_id', 'user_id');
    }
    public function goldSavings()
    {
        return $this->belongsTo(GoldSavingsRegistration::class);
    }
}
