<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colecao extends Model
{
    protected $fillable = [
        'colecao_description'
    ];

    public function product() {
        return $this->belongsToMany(Product::class);
    }
}
