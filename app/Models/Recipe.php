<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredients;
use App\Models\Cake;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'cake_id',
        'ingredient_id',
        // 'ing_name',
        'amount',
        // 'number',
        // 'raw_price',
    ];

    public function ingredients() {
        return $this->hasMany(Ingredients::class);
    }

    public function cakes() {
        return $this->hasOne(Cake::class);
    }
}
