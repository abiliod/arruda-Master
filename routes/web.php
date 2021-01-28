<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\PaginaController;
use App\Http\Controllers\Admin\PaginasController;
use App\Http\Controllers\Admin\UsuarioController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Product\ProductController;




use App\Http\Controllers\Cart\CartController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [CartController::class, 'index'])->name('/');
Route::get('/welcome', [CartController::class, 'index'])->name('index');
Route::get('/about_site', [CartController::class, 'sobre'])->name('sobre');
Route::get('/contact_site', [CartController::class, 'contato'])->name('contato');
Route::get('/cart_site', [CartController::class, 'cart'])->name('cart');
Route::get('/product_detail', [CartController::class, 'product_detail'])->name('product_detail');
Route::get('/checkout_site', [CartController::class, 'checkout'])->name('checkout');
Route::get('/order_complete', [CartController::class, 'order_complete'])->name('order_complete');
Route::get('/add_to_wishlist', [CartController::class, 'add_to_wishlist'])->name('add_to_wishlist');
Route::get('/women', [CartController::class, 'women'])->name('women');
Route::get('/men', [CartController::class, 'men'])->name('men');
Route::get('/search', [CartController::class, 'search'])->name('search');

//Cliente integaringo com paginas do site
Route::get('site/sobre', [PaginaController::class, 'sobre'])->name('site.sobre');
Route::get('site/contato', [PaginaController::class, 'contato'])->name('site.contato');
Route::put('site/contato/enviar', [PaginaController::class, 'enviarContato'])->name('site.contato.enviar');

Auth::routes();

//Administando o paginas do site
Route::get('/admins/paginas/', [PaginasController::class, 'index'])->name('admins.paginas');
Route::get('/admins/paginas/editar/{id}', [PaginasController::class, 'editar'])->name('admins.paginas.editar');
Route::put('/admins/paginas/atualizar/{id}', [PaginasController::class, 'atualizar'])->name('admins.paginas.atualizar');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/sair', [UsuarioController::class, 'sair'])->name('sair');


//Administando slides do site
Route::get('/admins/slides', [SlideController::class, 'index'])->name('admins.slides');
Route::get('/admins/slides/adicionar', [SlideController::class, 'adicionar'])->name('admins.slides.adicionar');
Route::post('/admins/slides/salvar', [SlideController::class, 'salvar'])->name('admins.slides.salvar');
Route::get('/admins/slides/editar/{id}', [SlideController::class, 'editar'])->name('admins.slides.editar');
Route::get('/admins/slides/deletar/{id}', [SlideController::class, 'deletar'])->name('admins.slides.deletar');
Route::put('/admins/slides/atualizar/{id}', [SlideController::class, 'atualizar'])->name('admins.slides.atualizar');

//Administando Produtos do site

Route::get('/admins/products/create', [ProductController::class, 'create'])->name('admins.products.create');
Route::post('/admins/products/store', [ProductController::class, 'store'])->name('admins.products.store');
Route::get('/admins/products/edit/{id}', [ProductController::class, 'edit'])->name('admins.products.edit');
Route::put('/admins/products/update/{id}', [ProductController::class, 'update'])->name('admins.products.update');
Route::get('/admins/products/destroy{id}', [ProductController::class, 'destroy'])->name('admins.products.destroy');
Route::get('/admins/products/destroyfiles/{id}', [ProductController::class, 'destroyfiles'])->name('admins.products.destroyfiles');
Route::post('/admins/products/{search?}', [ProductController::class, 'search'])->name('admins.products.search');
Route::get('/admins/products', [ProductController::class, 'index'])->name('admins.products');


/**
 * index – Lista os dados da tabela
 * create – Retorna a View para criar um item da tabela
 * show – Mostra um item específico
 * store – Salva o novo item na tabela
 * edit – Retorna a View para edição do dado
 * update – Salva a atualização do dado
 * destroy – Remove o dado
 */
