<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    protected $fillable = [
        'modelo_description'
    ];

    public function product() {
        return $this->belongsToMany(Product::class);
    }
}
