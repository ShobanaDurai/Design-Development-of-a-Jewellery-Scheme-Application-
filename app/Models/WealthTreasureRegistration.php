<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class WealthTreasureRegistration extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'phone',
        'email',
        'address',
        'state',
        'pincode',
        'country',
        'nominee',
        'timeperiod',
        'installment',
        'aadhaar',
        'user_id',
        'otp',
    ];
    protected $hidden = [
        'password',
        'otp',
    ];
    protected $casts = [
        'otp_verified_at' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'wealthtreasureregistration';

    public function wealthTransactions()
    {
        return $this->hasMany(WealthTransaction::class, 'user_id', 'user_id');
    }

     // Define a relationship with WealthTransaction
     public function transactions()
     {
         return $this->hasMany(WealthTransaction::class, 'user_id', 'user_id');
     }

     // Accessor for installments_paid
     public function getInstallmentsPaidAttribute()
     {
         return $this->transactions->count();
     }

     // Accessor for status
     public function getStatusAttribute()
     {
         $maturityDate = Carbon::parse($this->created_at)->addMonths($this->timeperiod);
         return Carbon::now()->greaterThanOrEqualTo($maturityDate) ? 'Inactive' : 'Active';
     }
}


