<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ingredients;

class Cake extends Model
{
    use HasFactory;
    
    public function ingredients() {
        return $this->hasMany(Indredients::class);
    } 
}
