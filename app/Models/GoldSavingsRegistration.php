<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class GoldSavingsRegistration extends Model
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

    protected $table = 'goldsavingsregistration';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusAttribute()
    {
        $maturityDate = Carbon::parse($this->created_at)->addMonths(12);
        return Carbon::now()->greaterThanOrEqualTo($maturityDate) ? 'Inactive' : 'Active';
    }

}
