<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

class Variacao extends Model
{
    protected $table = 'variacoes';
    protected $fillable = [
        'produto_id'
        , 'tamanho_br'
        , 'tamanho_eua'
        , 'altura'
        , 'cor'
        , 'estoque'
        , 'preco'
        , 'desconto'
        , 'peso_bruto'
        , 'peso_liq'
        , 'imagem_product'
        , 'directory_product'
        , 'status'

    ];
    public function products()
    {
        return $this->hasMany(Variacao::class,'produto_id', 'id' );
    }



}
