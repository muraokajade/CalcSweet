<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cake;
use App\Models\Recipe;

class Ingredients extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','weight','g_price', 'p_date','p_camp'];


    public function recipes() {
        return $this->hasMany(Recipe::class);
    }
    
    public function cakes() {
        return $this->belongsToMany(Cake::class,'recipes');
    }
    

    public function usedIngredients() {
        return $this->belongsToMany(Cake::class, 'recipes');
    }
    
    public function isUsedBy($cake) {
        $used_ingresient_ids = $this->usedIngredients->pluck('id');
        return $result = $used_ingresient_ids->contains($cake->id);
    }
}
