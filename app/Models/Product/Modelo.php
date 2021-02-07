<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $fillable = [
        'modelo_description'
    ];
    public function products() {
        return $this->hasMany(Product::class,'modelo_id');
    }
}
