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


    public function search(Request $request)
    {




        $modelos = Modelo::all();
        $colecaos = Colecao::all();
        $registros = DB::table('products')
            ->join('modelos', 'products.modelo_id', '=', 'modelos.id')
            ->join('colecaos', 'products.colecao_id', '=', 'colecaos.id')
            ->select('products.*','modelos.modelo_description','colecaos.colecao_description')
            ->where('referencia', '=',$request->all()['search'])
            ->OrWhere('sub_category', '=',$request->all()['search'])
            ->OrWhere([['descricao', 'LIKE', '%' . $request->all()['search'] .'%' ]])
            ->OrWhere([['composicao', 'LIKE', '%' . $request->all()['search'] .'%' ]])
            ->orderBy('products.id')
            ->paginate(16);
        return view('welcome', compact('registros', 'modelos','colecaos'));
    }
    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function product_detail($id)
    {
        $imagems = null;
        $registro = Product::find($id);
        $modelos = Modelo::all();
        $colecaos = Colecao::all();
        if (isset($registro->imagems))    $imagems =  json_decode($registro->imagems);
        $variacoes = DB::table('variacoes')
            ->join('products', 'products.id', '=', 'variacoes.produto_id')
            ->select('variacoes.*','products.*')
            ->where('produto_id' ,'=', $id)
            ->first();
        $sizes = DB::table('variacoes')
            ->join('products', 'products.id', '=', 'variacoes.produto_id')
            ->select('variacoes.*','products.*')
            ->where('produto_id' ,'=', $id)
            ->where('estoque' ,'>=', 1)
            ->get();
        return view('product_detail', compact('sizes',
            'imagems','registro','variacoes', 'modelos','colecaos'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $modelos = Modelo::all();
        $colecaos = Colecao::all();
        $registros = DB::table('products')
            ->join('modelos', 'products.modelo_id', '=', 'modelos.id')
            ->join('colecaos', 'products.colecao_id', '=', 'colecaos.id')
            ->select('products.*','modelos.modelo_description','colecaos.colecao_description')
            ->orderBy('products.id')
            ->paginate(16);
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
