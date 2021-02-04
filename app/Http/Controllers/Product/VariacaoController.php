<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Request\StoreVariacoes;
use App\Models\Product\Product;
use App\Models\Product\Variacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VariacaoController extends Controller
{
    public function update(StoreVariacoes $request,  $id)
    {
        $dados = $request->all();
        $res = DB::table('variacoes')
            ->where('produto_id' ,'=', $dados['produto_id'])
            ->where('tamanho_br' ,'=', $dados['tamanho_br'])
            ->where('cor' ,'=', $dados['cor'])
        ->get();
        $count = $res->count('produto_id');
        if ($count === 1) //  || ( !$count === null )
        {
            $registro = Variacao::find($id);
            $registro->tamanho_br =  $dados['tamanho_br'];
            $registro->tamanho_eua =  $dados['tamanho_eua'];
            $registro->altura =  $dados['altura'];
            $registro->cor =  $dados['cor'];
            $registro->peso_liq =  $dados['peso_liq'];
            $registro->peso_bruto =  $dados['peso_bruto'];
            $registro->estoque =  $dados['estoque'];
            $registro->preco =  $dados['preco'];
            $registro->desconto =  $dados['desconto'];
            $registro->update();
            $id = $registro->produto_id;
            $variacoes = DB::table('variacoes')
                ->join('products', 'products.id', '=', 'variacoes.produto_id')
                ->select('products.*','variacoes.*')
                ->where('produto_id' ,'=', $dados['produto_id'])
                ->paginate(10);
            $registro = Product::find($id);

            \Session::flash('mensagem',['msg'=>'Registro atualizado.'
                ,'class'=>'green white-text']);

            return view('admins.variacoes.index', compact('variacoes','registro','id'));
        }
        else
        {
            \Session::flash('mensagem',['msg'=>'O registro não pode ser incluido dado que as propriedades
            [Tamanho e Cor] são as mesmas para uma variação existente.'
                ,'class'=>'red white-text']);
            return redirect()->route('admins.variacoes.create',$id);
        }
    }

    public function store(StoreVariacoes $request)
    {
        $dados = $request->all();

        $res = DB::table('variacoes')
            ->where('produto_id' ,'=', $dados['produto_id'])
            ->where('tamanho_br' ,'=', $dados['tamanho_br'])
            ->where('cor' ,'=', $dados['cor'])
            ->get();
        $count = $res->count('produto_id');
       // dd(  $count,  $dados);
        if ($count === 0)
        {
            $registro = new Variacao();
            $dados = $request->all();
            $registro->produto_id =  $dados['produto_id'];
            $registro->tamanho_br =  $dados['tamanho_br'];
            $registro->tamanho_eua =  $dados['tamanho_eua'];
            $registro->altura =  $dados['altura'];
            $registro->cor =  $dados['cor'];
            $registro->peso_liq =  $dados['peso_liq'];
            $registro->peso_bruto =  $dados['peso_bruto'];
            $registro->estoque =  $dados['estoque'];
            $registro->preco =  $dados['preco'];
            $registro->desconto =  $dados['desconto'];
            $registro->save();
            $id = $registro->produto_id;
            $variacoes = DB::table('variacoes')
                ->join('products', 'products.id', '=', 'variacoes.produto_id')
                ->select('products.*','variacoes.*')
                ->where('produto_id' ,'=', $dados['produto_id'])
                ->paginate(10);
            $registro = Product::find($id);
            \Session::flash('mensagem',['msg'=>'Registro criado.'
                ,'class'=>'green white-text']);
            return view('admins.variacoes.index', compact('variacoes','registro','id'));
        }
        else
        {
            \Session::flash('mensagem',['msg'=>'O registro não pode ser incluido dado que as propriedades
            [Tamanho e Cor] são as mesmas para uma variação existente.'
                ,'class'=>'red white-text']);
            return redirect()->route('admins.variacoes.edit',$id);
        }


    }

    public function search (Request $request)
    {
        $id = $request->all()['product_id']; // id do produto
        $variacoes = DB::table('variacoes')
            ->join('products', 'products.id', '=', 'variacoes.produto_id')
            ->select('products.*','variacoes.*')
            ->where('produto_id' ,'=', $id)
            ->where('cor' ,'=', $request->all()['search'])
            ->OrWhere('tamanho_br' ,'=', $request->all()['search'])
            ->paginate(10);

        $registro = Product::find($id);
        return view('admins.variacoes.index', compact('variacoes','id','registro'));
    }

    public function edit($id) // id da variação
    {
        $registro = DB::table('variacoes')
            ->join('products', 'products.id', '=', 'variacoes.produto_id')
            ->select('products.*','variacoes.*')
            ->where('variacoes.id' ,'=', $id)
            ->first();

        return view('admins.variacoes.edit', compact('registro','id'));
    }
    public function create($id) // id do produto
    {
        $registro = DB::table('products')
            ->where('id' ,'=', $id)
            ->first();
        return view('admins.variacoes.create', compact('registro','id'));
    }
    public function index($id) // id do produto foreygn
    {
        $registro = Product::find($id);

        $variacoes = DB::table('variacoes')
            ->join('products', 'products.id', '=', 'variacoes.produto_id')
            ->select('products.*','variacoes.*')
            ->where('produto_id' ,'=', $id)
            ->paginate(10);
        return view('admins.variacoes.index', compact('variacoes','id', 'registro'));
    }
    public function destroy($id) //a variação
    {
//         $pedido = DB::table('items_pedido')
//             ->select('numPedido')
//             ->where([
//                  ['product_id', '=', $id]
//             ])
//        ->first();
//
        //implementar o metodo acima para não
        // permitir deleção indevida de objeto que foi vendido.
        $pedido=null;
        if(!empty(  $pedido->id ))
        {
            \Session::flash('mensagem',['msg'=>'Registro Não pode ser excluido, pois está
              Relacionado ao item de venda.'
                ,'class'=>'red white-text']);
            $registro = Variacao::find($id);
            $id = $registro->produto_id;  // id do produto
            $variacoes = DB::table('variacoes')
                ->join('products', 'products.id', '=', 'variacoes.produto_id')
                ->select('products.*','variacoes.*')
                ->where('produto_id' ,'=', $id)
                ->paginate(10);
            return view('admins.variacoes.index', compact('variacoes','id'));
        }
        else
        {
            $registro = Variacao::find($id);
            $id = $registro->produto_id;  // id do produto
            dd($registro);
            $registro->delete();
            \Session::flash('mensagem',['msg'=>'Registro excluído.'
                ,'class'=>'green white-text']);
            $variacoes = DB::table('variacoes')
                ->join('products', 'products.id', '=', 'variacoes.produto_id')
                ->select('products.*','variacoes.*')
                ->where('produto_id' ,'=', $id)
                ->paginate(10);
            return view('admins.variacoes.index', compact('variacoes','id'));
        }
    }

}
