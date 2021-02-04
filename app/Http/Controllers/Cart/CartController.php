<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product\Colecao;
use App\Models\Product\Modelo;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use App\Models\Admin\Pagina;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function product_detail($id)
    {
        $registro = Product::find($id);
        $modelos = Modelo::all();
        $colecaos = Colecao::all();

        $variacoes = DB::table('variacoes')
            ->join('products', 'products.id', '=', 'variacoes.produto_id')
            ->select('products.*','variacoes.*')
            ->where('produto_id' ,'=', $id)
            ->first();
     //   $imagens = $variacoes->imagem_capa;

       $fotos =  json_decode($variacoes->imagems);

//        $fotos =  strval($fotos);
//        dd($fotos);
//
//        foreach ($fotos as $chave => $valor) {
//            //disponível variáveis $chave e $valor
//          echo $chave .'=>'. $valor;
//          //  echo $valor;
//        }
//        dd($fotos);

        return view('product_detail', compact('registro','variacoes', 'modelos','colecaos'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $modelos = Modelo::all();
        $colecaos = Colecao::all();
        $registros = DB::table('variacoes')
            ->join('products', 'products.id', '=', 'variacoes.produto_id')
            ->join('modelos', 'products.modelo_id', '=', 'modelos.id')
            ->join('colecaos', 'products.colecao_id', '=', 'colecaos.id')
            ->select('products.*','variacoes.*','modelos.modelo_description','colecaos.colecao_description')
            ->paginate(16);
      //  dd(  $registros);

        return view('welcome', compact('registros', 'modelos','colecaos'));

    }

    public function add_to_wishlist() //
    {
        return view('add_to_wishlist');
    }
    public function order_complete() //
    {
        return view('order_complete');
    }
    public function checkout() //
    {
        return view('checkout_site');
    }

    public function cart() //
    {
        return view('cart_site');
    }
    public function contato() //
    {
        $pagina = Pagina::where('tipo','=','contato')->first();

        return view('contact_site',compact('pagina'));
       // return view('contact_site');
    }
    public function sobre() //
    {
        $pagina = Pagina::where('tipo','=','sobre')->first();

        return view('about_site',compact('pagina'));
     //   return view('about_site');
    }

    public function search()
    {
        //buscar um produto pela descrição e mostrar a listagem
        return view('welcome');
    }
    public function women()
    {
        // filtrar por genero  feminino
        return view('welcome');
    }
    public function men()
    {
        // filtrar por genero masculino
        return view('welcome');
    }

}
