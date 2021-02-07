<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product\Variacao;

class Product extends Model
{
   // use HasFactory;
    protected $fillable = [
          'sub_category'
        , 'descricao'
        , 'modelo_id'
        , 'colecao_id'
        , 'referencia'
        , 'genero'
        , 'composicao'
        , 'tipo_un'
        , 'palmilha'
        , 'acessorios'
        , 'salto'
        , 'solado'
        , 'imagem_capa'
        , 'imagems'
        , 'directory'
        , 'directory_capa'
        , 'descricaolonga'
        , 'detalhe'
        , 'visualizacoes'
        , 'publicar'

    ];
    //no pedido haverá um desconto de x por cento
    // a depender da forma de pagamento se a quantidade do pedido for superior a uma determinada quantidade
    // de produtos ou superior a um valor x.

    public function modelo()
    {
       return $this->belongsTo('App\Models\Product\Modelo','modelo_id');
    //    return $this->belongsTo(\App\Models\Product\Modelo::class);
    }
    public function colecao()
    {
        return $this->belongsTo('App\Models\Product\Colecao','colecao_id');
    //    return $this->belongsTo(\App\Models\Product\Colecao::class);
    }

    public function variacoes() {
       return $this->belongsTo(\App\Models\Product\Variacao::class);
    }
}
