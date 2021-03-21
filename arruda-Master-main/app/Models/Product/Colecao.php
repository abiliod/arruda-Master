<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colecao extends Model
{
    protected $fillable = [
        'colecao_description'
    ];

    public function products() {
        return $this->hasMany(Product::class,'product_id');

    }
}
