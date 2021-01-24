<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
   // use HasFactory;
    protected $fillable = [
          'composicao'  //[NOBUQUE, CAMURÇA, VERNIZ, NAPA FLORAL...]
        , 'referencia'
        , 'genero'
        , 'descricao'
        , 'colecao'     //  [LUXO,MARINA, JULIA ]
        , 'numero_br'   // ex.  33
        , 'numero_eua'  // ex.  8 convertido para americano
        , 'tamanho'     // tamanho [medio,grande]
        , 'altura'
        , 'genero'     // [MASCULINO, FEMININO, UNISSEX]
        , 'cor'        // [ PRETO,BRANCO,MARFIM]
        , 'palmilha'   // [CONFORT,TRADICIONAL PRETO BEJE MARFIM]
        , 'modelo'     // [scarpin, ana bela, sapatilha, plataforma ,...]
        , 'acessorios' // [extrais, spaike, ilhos, cardaço....]
        , 'salto'       // [fino, bloco, taça,]
        , 'solado'    // [ pvc, tr, sofort]
        , 'imagem'
        , 'preco'
        , 'desconto'
        , 'estoque'
        , 'descricaolonga'
        , 'detalhe'
    ];
    //no pedido haverá um desconto de x por cento
    // a depender da forma de pagamento se a quantidade do pedido for superior a uma determinada quantidade
    // de produtos ou superior a um valor x.
}
