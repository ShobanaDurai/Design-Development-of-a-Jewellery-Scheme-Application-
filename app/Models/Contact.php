<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable=[
        'content',
        'map',
        'headquarters',
        'contact_number',
        'email',
        'monday_friday_open',
        'monday_friday_close',
        'weekend_open',
        'weekend_close',
    ];
}
