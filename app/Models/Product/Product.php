<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   // use HasFactory;
    protected $fillable = [
          'composicao'  //[NOBUQUE, CAMURÇA, VERNIZ, NAPA FLORAL...]
        , 'modelo_id'     // [scarpin, ana bela, sapatilha, plataforma ,...]
        , 'colecao_id'     //  [LUXO,MARINA, JULIA ]
        , 'referencia'
        , 'genero'
        , 'descricao'
        , 'numeracao_br'   // ex.  33
        , 'numeracao_eua'  // ex.  8 convertido para americano
        , 'tamanho'     // tamanho [medio,grande]
        , 'altura'
        , 'genero'     // [MASCULINO, FEMININO, UNISSEX]
        , 'cor'        // [ PRETO,BRANCO,MARFIM]
        , 'palmilha'   // [CONFORT,TRADICIONAL PRETO BEJE MARFIM]
        , 'acessorios' // [extrais, spaike, ilhos, cardaço....]
        , 'salto'       // [fino, bloco, taça,]
        , 'solado'    // [ pvc, tr, sofort]
        , 'imagem'
        , 'preco'
        , 'desconto'
        , 'estoque'
        , 'descricaolonga'
        , 'detalhe'
        ,'sub_category'
        ,'directory'
    ];
    //no pedido haverá um desconto de x por cento
    // a depender da forma de pagamento se a quantidade do pedido for superior a uma determinada quantidade
    // de produtos ou superior a um valor x.

    public function modelo()
    {
        return $this->belongsTo('App\Models\Product\Modelo','modelo_id');
    }
    public function colecao()
    {
        return $this->belongsTo('App\Models\Product\Colecao','colecao_id');
    }

//    public function modelo()
//    {
//        return $this->belongsToMany(Modelo::class);
//
//    }
//    public function colecao()
//    {
//        return $this->belongsToMany(Colecao::class);
//    }

//    public function modelo()
//    {
//        return $this->hasMany('Modelo','id');
//    }
//    public function colecao()
//    {
//        return $this->hasMany('Colecao','id');
//    }
}
