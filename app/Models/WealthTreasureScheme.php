<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WealthTreasureScheme extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'short_description', 'image', 'description'];
    protected $table = 'wealth_treasure_scheme';
}
