<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissao extends Model
{

    protected $table = "permissaos";

    protected $fillable= [
        'nome',
        'descricao'
    ];

    public function papeis()
    {
        return $this->belongsToMany(Papel::class);
    }

}
