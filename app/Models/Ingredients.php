<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cake;

class Ingredients extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','weight','g_price', 'p_date','p_camp'];

    public function cake() {
        return $this->belongsToMany(Cake::class,'recipes');
    }

    public function recipes() {
        return $this->belongsTo(Recipe::class);
    }
}
