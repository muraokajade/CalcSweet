<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredients;

class Cake extends Model
{
    use HasFactory;
    protected $fillable = ['ingredient_id','ing_name','amount','number','raw_price'];
    
    public function ingredients() {
        return $this->hasMany(Indredients::class);
    } 
}
