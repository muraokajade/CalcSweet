<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredients;
use App\Models\Recipe;

class Cake extends Model
{
    use HasFactory;
    protected $fillable = ['name','ingredient_id','ing_name','amount','number','raw_price'];

    public function ingredients() {
        return $this->belongsToMany(Ingredients::class, 'recipes');
    }

    public function recipe() {
        return $this->belongsTo(Recipe::class);
    }

}
