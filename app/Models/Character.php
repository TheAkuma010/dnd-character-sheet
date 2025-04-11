<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'race', 'class', 'level', 'attributes', 'skills', 'inventory', 'spells'];
    protected $casts = [
        'attributes' => 'array',
        'skills' => 'array',
        'inventory' => 'array',
        'spells' => 'array',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }
    public function spells()
    {
        return $this->hasMany(Spell::class);
    }
}
