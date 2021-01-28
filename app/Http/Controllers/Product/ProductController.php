<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\Colecao;
use App\Models\Product\Modelo;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyfiles($img)
    {


        $pos = strpos($img, '&');
        $id = substr($img,$pos+1);
        dd('destroyfiles', $id);

//        $inspecao = DB::table('itensDeInspecao')
//            ->join('verificacoes', 'itensDeInspecao.verificacao_id', '=', 'verificacoes.id')
//            ->where([['itensDeInspecao.id', '=', $id ]])
//            ->first();
//        $diretorio = "img/compliance/inspecao/".$inspecao->codigo."/".$id."/";
//        $imagempath = substr($img,0,$pos);
//        $imagempath= str_replace('-', '/', $imagempath);
//
//        $pos = strpos( $imagempath, $diretorio );
//        if ($pos === false) {
//            \Session::flash('mensagem',['msg'=>'Imagem não foi Excluida do Item.'
//                ,'class'=>'red white-text']);
//        } else {
//            unlink($imagempath);
//            \Session::flash('mensagem',['msg'=>'A Imagem foi Excluida do Item.'
//                ,'class'=>'green white-text']);
//        }

        return redirect()-> route('admins.products.edit',$id);

    }

    public function edit($id)
    {
        $registro = Product::find($id);
        $modelos = Modelo::all();
        $colecaos = Colecao::all();
        return view('admins.products.edit', compact('registro', 'modelos','colecaos'));
    }

    /**
     * @param Request $request
     */
    public function search (Request $request)
    {
        $dados = $request->all();
        $modelos = Modelo::all();
        $colecaos = Colecao::all();

        if(( ! $dados['modelo_description']==null ) || (! $dados['colecao_description'] ==null ) ||  (! $dados['search'] == null ))
        {
            if(( ! $dados['modelo_description']==null ) && (! $dados['colecao_description'] ==null ) &&  (! $dados['search'] == null ))
            {
                $registros = DB::table('products')
                    ->join('modelos', 'products.modelo_id', '=', 'modelos.id')
                    ->join('colecaos', 'products.colecao_id', '=', 'colecaos.id')
                    ->select('products.*','modelos.modelo_description','colecaos.colecao_description')
                    ->where('products.modelo_id', '=', $dados['modelo_description'] )
                    ->where('products.colecao_id', '=', $dados['colecao_description'] )
                    ->where('products.descricao',  'LIKE', '%' . $request->all()['search'] .'%')
                    ->orWhere('products.referencia',  'LIKE', '%' . $request->all()['search'] .'%')
                ->paginate(10);
                return view('admins.products.index', compact('registros', 'modelos','colecaos'));
            }
                else if(( ! $dados['modelo_description']==null ) && (! $dados['colecao_description'] ==null ) &&  ( $dados['search'] == null ))
                {
                    $registros = DB::table('products')
                        ->join('modelos', 'products.modelo_id', '=', 'modelos.id')
                        ->join('colecaos', 'products.colecao_id', '=', 'colecaos.id')
                        ->select('products.*','modelos.modelo_description','colecaos.colecao_description')
                        ->where('products.modelo_id', '=', $dados['modelo_description'] )
                        ->where('products.colecao_id', '=', $dados['colecao_description'] )
                        ->paginate(10);
                    return view('admins.products.index', compact('registros', 'modelos','colecaos'));
                }
                    else if((  $dados['modelo_description']==null ) && ( $dados['colecao_description'] ==null ) &&  (! $dados['search'] == null ))
                    {
                          $registros = DB::table('products')
                            ->join('modelos', 'products.modelo_id', '=', 'modelos.id')
                            ->join('colecaos', 'products.colecao_id', '=', 'colecaos.id')
                            ->select('products.*','modelos.modelo_description','colecaos.colecao_description')
                            ->where('products.descricao',  'LIKE', '%' . $request->all()['search'] .'%')
                            ->orWhere('products.referencia',  'LIKE', '%' . $request->all()['search'] .'%')
                            ->paginate(10);
                        return view('admins.products.index', compact('registros', 'modelos','colecaos'));
                    }
                        else  if(( ! $dados['modelo_description']==null ) && ( $dados['colecao_description'] ==null ) &&  ( $dados['search'] == null ))
                        {
                            $registros = DB::table('products')
                                ->join('modelos', 'products.modelo_id', '=', 'modelos.id')
                                ->join('colecaos', 'products.colecao_id', '=', 'colecaos.id')
                                ->select('products.*','modelos.modelo_description','colecaos.colecao_description')
                                ->where('products.modelo_id', '=', $dados['modelo_description'] )
                                ->paginate(10);
                            return view('admins.products.index', compact('registros', 'modelos','colecaos'));
                        }
                            else
                            {
                                $registros = DB::table('products')
                                    ->join('modelos', 'products.modelo_id', '=', 'modelos.id')
                                    ->join('colecaos', 'products.colecao_id', '=', 'colecaos.id')
                                    ->select('products.*','modelos.modelo_description','colecaos.colecao_description')
                                    ->where('products.colecao_id', '=', $dados['colecao_description'] )
                                    ->paginate(10);
                                return view('admins.products.index', compact('registros', 'modelos','colecaos'));
                            }
        }
        else
        {
            \Session::flash('mensagem',['msg'=>'Parâmetros insuficiente para localizar. Informe ao menos um parâmetro!'
                ,'class'=>'red white-text']);
            $modelos = Modelo::all();
            $colecaos = Colecao::all();
            $registros = DB::table('products')
                ->join('modelos', 'products.modelo_id', '=', 'modelos.id')
                ->join('colecaos', 'products.colecao_id', '=', 'colecaos.id')
                ->select('products.*','modelos.modelo_description','colecaos.colecao_description')
                ->paginate(10);
            return view('admins.products.index', compact('registros', 'modelos','colecaos'));
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelos = Modelo::all();
        $colecaos = Colecao::all();
        $registros = DB::table('products')
            ->join('modelos', 'products.modelo_id', '=', 'modelos.id')
            ->join('colecaos', 'products.colecao_id', '=', 'colecaos.id')
            ->select('products.*','modelos.modelo_description','colecaos.colecao_description')
        ->paginate(10);
        return view('admins.products.index', compact('registros', 'modelos','colecaos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd('parou create');
                return view('admins.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
         Product::create($request->all());

        \Session::flash('mensagem',['msg'=>'Produto Criado com sucesso !'
                  ,'class'=>'green white-text']);

        $registros = DB::table('products')
        ->paginate(15);

        return view('admins.products.index', compact('registros'));

    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $directory = "img/products/".$id.'/';
        $registro = Product::find($id);
        $dados = $request->all();
        $registro->sub_category =  $dados['sub_category'];
        $registro->referencia =  $dados['referencia'];
        $registro->composicao =  $dados['composicao'];
        $registro->modelo_id =  $dados['modelo_id'];
        $registro->colecao_id =  $dados['colecao_id'];
        $registro->referencia =  $dados['referencia'];
        $registro->genero =  $dados['genero'];
        $registro->descricao =  $dados['descricao'];
        $registro->numeracao_br =  $dados['numeracao_br'];
        $registro->numeracao_eua =  $dados['numeracao_eua'];
        $registro->tamanho =  $dados['tamanho'];
        $registro->altura =  $dados['altura'];
        $registro->genero =  $dados['genero'];
        $registro->cor =  $dados['cor'];
        $registro->palmilha =  $dados['palmilha'];
        $registro->acessorios =  $dados['acessorios'];
        $registro->salto =  $dados['salto'];
        $registro->solado =  $dados['solado'];
        $registro->preco =  $dados['preco'];
       // dd( $registro->preco );
        $registro->desconto =  $dados['desconto'];
        $registro->estoque =  $dados['estoque'];
        $registro->descricaolonga =  $dados['descricaolonga'];
        $registro->detalhe =  $dados['detalhe'];
        if($request->hasfile('imagem')) {
            request()->validate([
                'imagem' => 'required',
                'imagem.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if ($images = $request->file('imagem')) {
                $count=1;
                foreach ($images as $file) {
                    $destinationPath = $directory; // upload path $registro->referencia
                    $profileImage = $registro->referencia.'_'.date('YmdHis').'_'.$count.'.'. $file->getClientOriginalExtension();
                    $file->move($destinationPath, $profileImage);
                    $imagens[]['image'] = "$profileImage";
                    $count++;
                }
            }
            $registro->directory = $directory;
            $registro->imagem = $registro->imagem . json_encode($imagens);
        }

//        $categoria_id = Request::input('categoria_id');
//        $categoria = Categoria::find($categoria_id);
//        $produto->categoria()->associate($categoria); // associamos antes de persistir

        $registro->update();

        \Session::flash('mensagem',['msg'=>'Produto atualizado com sucesso !'
                  ,'class'=>'green white-text']);
        $modelos = Modelo::all();
        $colecaos = Colecao::all();
        $registros = DB::table('products')
            ->join('modelos', 'products.modelo_id', '=', 'modelos.id')
            ->join('colecaos', 'products.colecao_id', '=', 'colecaos.id')
            ->select('products.*','modelos.modelo_description','colecaos.colecao_description')
            ->paginate(10);
        return view('admins.products.index', compact('registros', 'modelos','colecaos'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        dd('parou create');
//              $pedido = DB::table('pedido')
//           ->select('numPedido')
//           ->where([
//                ['product_id', '=', $id]
//        ])
//        ->first();
        $pedido = Product::find(70); //substituir pelo metodo acima para não
        // permitir deleção indevida. e descomentar o delete()

        if(!empty(  $pedido->id ))
        {
            \Session::flash('mensagem',['msg'=>'Registro Não pode ser excluido, pois está
              Relacionado ao item de venda.'
                ,'class'=>'red white-text']);
            $registros = DB::table('products')
                ->paginate(15);

            return view('admins.products.index', compact('registros'));
        }
        else
        {
            $registro = Product::find($id);
        //    descomentar o delete() abaixo
        //    $registro->delete();
            \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!'
                ,'class'=>'green white-text']);

            $registros = DB::table('products')
                ->paginate(15);

            return view('admins.products.index', compact('registros'));
        }
    }
}
