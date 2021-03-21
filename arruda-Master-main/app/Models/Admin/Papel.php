<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Papel extends Model
{
    protected $fillable= [
        'nome',
        'descricao'
    ];

    public function permissoes()
    {
        return $this->belongsToMany(Permissao::class);
    }

    public function adicionarPermissao($permissao)
    {
        return $this->permissoes()->save($permissao);
    }

    public function removerPermissao($permissao)
    {
        return $this->permissoes()->detach($permissao);
    }
}
