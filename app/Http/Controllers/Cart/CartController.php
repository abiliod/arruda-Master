<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Pagina;

class CartController extends Controller
{


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
    public function product_detail() //
    {
        return view('product_detail');
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
    public function index()
    {
        return view('welcome');
    }
}
