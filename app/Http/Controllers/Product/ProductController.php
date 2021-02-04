<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Request\StoreProduct;
use App\Models\Product\Colecao;
use App\Models\Product\Modelo;
use App\Models\Product\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Pagination\Paginator;


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
        $registro = Product::find($id);
        $directory = "img/products/".$registro->id.'/';
        $imagempath = substr($img,0,$pos);
        $imagempath= str_replace('-', '/', $imagempath);
        $pos = strpos( $imagempath, $directory );
        if ($pos === false)
        {
           \Session::flash('mensagem',['msg'=>'Imagem não foi Excluida do Item.'
                ,'class'=>'red white-text']);
        }
        else
        {
            unlink($imagempath);
            \Session::flash('mensagem',['msg'=>'A Imagem foi Excluida do Item.'
                ,'class'=>'green white-text']);
        }
        return redirect()-> route('admins.products.edit',$id);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $variacoes = DB::table('variacoes')
            ->where('produto_id' ,'=', $id)
            ->get();
        $count = $variacoes->count('produto_id');

        if(!$count == 0)
        {
            \Session::flash('mensagem',['msg'=>'Registro Não pode ser excluido, pois está
              Relacionado a uma variação.'
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
        else
        {
            $registro = Product::find($id);

//            04-02 ajustar para  antes da exclusão se tem imagem  ou diretorio de imagem para excluir
            $registro->delete();

            \Session::flash('mensagem',['msg'=>'Registro excluído com sucesso!'
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
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( StoreProduct  $request)
    {
        $count=1;
        $registro = new Product();
        $dados = $request->all();
        $registro->referencia =  $dados['referencia'];
        $registro->sub_category =  $dados['sub_category'];
        $registro->descricao =  $dados['descricao'];
        $registro->colecao_id =  $dados['colecao_id'];
        $registro->modelo_id =  $dados['modelo_id'];
        $registro->tipo_un =  $dados['tipo_un'];
        $registro->composicao =  $dados['composicao'];
        $registro->genero =  $dados['genero'];
        $registro->palmilha =  $dados['palmilha'];
        $registro->salto =  $dados['salto'];
        $registro->solado =  $dados['solado'];
        $registro->descricaolonga =  $dados['descricaolonga'];
        $registro->detalhe =  $dados['detalhe'];
        $registro->save();
        $directory = "img/products/".$registro->id.'/';
        $directory_capa = "img/products/".$registro->id.'/capa/';
        if($request->hasfile('imagem_capa'))
        {
            request()->validate([
                'imagem_capa' => 'required',
                'imagem_capa.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);
            $file = $request->file('imagem_capa');
            if($file) {
                $dirimagempath = $directory_capa;
                if(is_dir($dirimagempath)){
                    $imagens = glob($dirimagempath . "*.*"); //obter todas imagens do diretório
                    if($imagens){
                        foreach($imagens as $imagem){
                            unlink($imagem); // remove todas imagens
                        }
                    }
                }
                $ext = $file->guessClientExtension();
                $nomeArquivo = strtolower ($registro->referencia.'_'.date('YmdHis').'_capa_'.$count.'.'.$ext);
                $file->move($dirimagempath,$nomeArquivo);
                $registro->imagem_capa = $dirimagempath.$nomeArquivo;
            }
        }
        if($request->hasfile('imagems'))
        {
            $dirimagempath = $directory;
            if(is_dir($dirimagempath)){
                $imagens = glob($dirimagempath . "*.*"); //obter todas imagens do diretório
                if($imagens){
                    foreach($imagens as $imagem){
                        unlink($imagem); // remove todas imagens
                    }
                }
            }
            request()->validate([
                'imagems' => 'required',
                'imagems.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);
            if ($imagems = $request->file('imagems')) {
                foreach ($imagems as $file) {
                    $destinationPath = $directory; // upload path
                    $profileImage =strtolower ($registro->referencia.'_'.date('YmdHis').'_'.$count.'.'. $file->getClientOriginalExtension());
                    $file->move($destinationPath, $profileImage);
                    $imagems[]['imagems'] = "$profileImage";
                    $count++;
                }
            }
            $registro->directory = $directory;
            $registro->imagems = $registro->imagems . json_encode($imagems);
            //  Log::info('Show : '. json_encode($imagems));
        }
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelos = Modelo::all();
        $colecaos = Colecao::all();
        return view('admins.products.create', compact('modelos','colecaos'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, $id)
    {
        $count=1;
        $directory = "img/products/".$id.'/';
        $directory_capa = "img/products/".$id.'/capa/';
        $registro = Product::find($id);
        $dados = $request->all();
        $registro->referencia =  $dados['referencia'];
        $registro->sub_category =  $dados['sub_category'];
        $registro->descricao =  $dados['descricao'];
        $registro->colecao_id =  $dados['colecao_id'];
        $registro->modelo_id =  $dados['modelo_id'];
        $registro->tipo_un =  $dados['tipo_un'];
        $registro->composicao =  $dados['composicao'];
        $registro->genero =  $dados['genero'];
        $registro->palmilha =  $dados['palmilha'];
        $registro->salto =  $dados['salto'];
        $registro->solado =  $dados['solado'];
        $registro->descricaolonga =  $dados['descricaolonga'];
        $registro->detalhe =  $dados['detalhe'];
        if($request->hasfile('imagem_capa'))
        {
            request()->validate([
                'imagem_capa' => 'required',
                'imagem_capa.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);

            $file = $request->file('imagem_capa');
            if($file)
            {
                $dirimagempath = $directory_capa;
                if(is_dir($dirimagempath))
                {
                    $imagens = glob($dirimagempath . "*.*"); //obter todas imagens do diretório
                    if($imagens)
                    {
                        foreach($imagens as $imagem)
                        {
                            unlink($imagem); // remove todas imagens
                        }
                    }
                }
                $ext = $file->guessClientExtension();
                $nomeArquivo = strtolower ($registro->referencia.'_'.date('YmdHis').'_capa_'.$count.'.'.$ext);
                $file->move($dirimagempath,$nomeArquivo);
                $registro->imagem_capa = $dirimagempath.$nomeArquivo;
            }
        }
        if($request->hasfile('imagems'))
        {
            $dirimagempath = $directory;
            if(is_dir($dirimagempath))
            {
                $imagens = glob($dirimagempath . "*.*"); //obter todas imagens do diretório
                if($imagens)
                {
                    foreach($imagens as $imagem)
                    {
                        unlink($imagem); // remove todas imagens
                    }
                }
            }
            request()->validate([
                'imagems' => 'required',
                'imagems.*' => 'image|mimes:jpeg,png,jpg,svg|max:2048'
            ]);
            if ($imagems = $request->file('imagems'))
            {
                foreach ($imagems as $file)
                {
                    $destinationPath = $directory; // upload path
                    $profileImage =strtolower ($registro->referencia.'_'.date('YmdHis').'_'.$count.'.'. $file->getClientOriginalExtension());
                    $file->move($destinationPath, $profileImage);
                    $imagems[]['imagems'] = "$profileImage";
                    $count++;
                }
            }
            $registro->directory = $directory;
            $registro->imagems = $registro->imagems . json_encode($imagems);
          //  Log::info('Show : '. json_encode($imagems));
        }
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
    public function edit($id)
    {
        $registro = Product::find($id);
        $modelos = Modelo::all();
        $colecaos = Colecao::all();
        return view('admins.products.edit', compact('registro', 'modelos','colecaos', 'id'));
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
                    ->where('products.sub_category',  'LIKE', '%' . $request->all()['search'] .'%')
                    ->orWhere('products.descricao',  'LIKE', '%' . $request->all()['search'] .'%')
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
        ->Paginate(5);
       // ->simplePaginate(5);
        return view('admins.products.index', compact('registros', 'modelos','colecaos'));
    }

}
