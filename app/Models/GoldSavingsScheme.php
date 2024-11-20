<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoldSavingsScheme extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'short_description', 'image', 'description'];
    protected $table = 'gold_savings_scheme';
}
