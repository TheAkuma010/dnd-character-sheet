<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spell extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'classes'];
    protected $casts = [
        'description' => 'array',
        'classes' => 'array',
    ];
}
