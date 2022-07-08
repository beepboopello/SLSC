<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArmorSet extends Model
{
    use HasFactory;
    protected $fillable = [
        'price',
        'name',
        'description',
        'url'
    ];
}
