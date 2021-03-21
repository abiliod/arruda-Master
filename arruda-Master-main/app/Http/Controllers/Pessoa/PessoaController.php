<?php

namespace App\Http\Controllers\Pessoa;

use App\Http\Controllers\Controller;
use App\Models\Admin\Papel_user;
use App\Models\Cidades\Endereco;
use App\Models\Pessoas\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PessoaController extends Controller
{

    /**
     * index – Lista os dados da tabela
     * show – Mostra um item específico
     * create – Retorna a View para criar um item da tabela
     * store – Salva o novo item na tabela
     * edit – Retorna a View para edição do dado
     * update – Salva a atualização do dado
     * destroy – Remove o dado
     */

    public function search (Request $request)
    {
        $registros = DB::table('pessoas')
            ->Where('priName_Razao', 'LIKE', '%' . $request->all()['search'] .'%' )
            ->orWhere('cpf_cnpj', 'LIKE', '%' . $request->all()['search'] .'%' )
            ->orWhere('lastName_Fantasia', 'LIKE', '%' . $request->all()['search'] .'%' )
        ->paginate(15);
        return view('admins.pessoas.index', compact('registros'));
    }

    public function addPessoa (Request $request)
    {
        $data = $this->validate($request, [
            'cpf_cnpj' => 'required|cpf_cnpj',
        ]);

        if (strlen( $request['cpf_cnpj'])==11) {
            $tipoPessoa="Fisica";
        } elseif (strlen( $request['cpf_cnpj'])==14){
            $tipoPessoa="Juridica";
        }

        $registro = DB::table('pessoas')
            ->where([
                ['cpf_cnpj', '=', $request->cpf_cnpj],
                ['email', '=', $request->email],
            ])->first();
        if($registro) {
            $enderecos = DB::table('enderecos')
                ->where([
                    ['pessoa_id', '=', $registro->id],
                ])->get();
            return view('admins.pessoas.manter', compact('registro','enderecos'));
        }

        if(Validator::make($data, [
            'cpf_cnpj' => ['required','unique:pessoas'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:pessoas'],
        ]))   {
            $id = DB::table('pessoas')->insertGetId([
                    'tipoPessoa' => $tipoPessoa
                    ,'priName_Razao' => $request->priName_Razao
                    ,'email' => $request->email
                    , 'cpf_cnpj' => $request->cpf_cnpj
                    , 'status' => 4
                ]
            );

            $registro = Pessoa::find($id);
            $enderecos= Endereco::where('pessoa_id', $registro->id)->get();
            \Session::flash('mensagem',['msg'=>'Registro Criado com Sucesso!'
                ,'class'=>'green white-text']);
            return view('admins.pessoas.manter', compact('registro','enderecos'));
        }
    }

    public function showFormAdicionarPessoa()
    {
        return view('admins.pessoas.adicionarPessoa');
    }

    public function atualizaEndereco(Request $request)
    {
//        if(!auth()->user()->can('pessoa_editar')){
        //          return redirect()->route('home');
        //    }

        $dados = $request->all();
        $registro = Pessoa::find($dados['pessoa_id']);
        $endereco = Endereco::find($dados['id']);

        $endereco->numero =  $dados['numero'];
        $endereco->complemento = $dados['complemento'];
        $endereco->tipo =  $dados['tipo'];

        $Papel_user = Papel_user::where('user_id', $registro->id)->first();

        if(($Papel_user->papel_id==1)||($Papel_user->papel_id==5)){

            $endereco ->update();
            $enderecos= Endereco::where('pessoa_id', $registro->id)->get();

            \Session::flash('mensagem',['msg'=>'Registro alterado com sucesso!'
                ,'class'=>'green white-text']);

            return view('admins.pessoas.manter', compact('registro','enderecos'));
        }
        else
        {
            \Session::flash('mensagem',['msg'=>'Registro Não Atualizado você não tem permissão contate o administrador!'
                ,'class'=>'green white-text']);

            return redirect()->route('home');
        }
    }

    public function edicaoEndereco($id)
    {
        $endereco = Endereco::find($id);
        $registro = Pessoa::find($endereco->pessoa_id);
        return view('admins.pessoas.editarEndereco', compact('registro' , 'endereco'));
    }

    public function destroyEndereco($id)
    {
        if(!auth()->user()->can('pessoa_deletar'))
        {
            \Session::flash('mensagem',['msg'=>'Registro Não foi Deletado Você não possue Credenciais, contate um Administrador!','class'=>'red white-text']);
            return redirect()->route('home');
        }
        $endereco = Endereco::find($id); // File::find($id)
        $registro = Pessoa::find($endereco->pessoa_id);

        if($registro)
        {
            $endereco->delete();
        }

        $enderecos= Endereco::where('pessoa_id', $registro->id)->get();
        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!'
            ,'class'=>'green white-text']);

        return view('admins.pessoas.manter', compact('registro','enderecos'));
    }

    public function enderecoSalvar(Request $request)
    {
        //   if(!auth()->user()->can('pessoa_editar')){
        //      return redirect()->route('home');
        //  }

        $dados = $request->all();
        //dd($dados );
        if (! Endereco::where('pessoa_id', '=', $dados['pessoa_id'])
            ->where('tipo', $dados['tipo'])
            ->first())
        {
            $endereco = new Endereco;
            $endereco->cep      = $dados['cep'];
            $endereco->estado    = $dados['uf'];
            $endereco->cidade     = $dados['cidade'];
            $endereco->bairro =  $dados['bairro'];
            $endereco->logradouro  = $dados['logradouro'];
            $endereco->numero =  $dados['numero'];
            $endereco->complemento = $dados['complemento'];
            $endereco->tipo =  $dados['tipo'];
            $endereco->pessoa_id =  $dados['pessoa_id'];
            $endereco ->save();

            $registro = Pessoa::find($dados['pessoa_id']);
            $registro->status=10;

            $Papel_user = Papel_user::where('user_id', $registro->id)->first();

            if(($Papel_user->papel_id==1)||($Papel_user->papel_id==5)) {

                /**TEM UMA FALHA AQUI PRECISA VALIDAR SE O USUARIO FOR= 5
                 *  O ID USER DEVE COINCIDIR COM O USER LOGADO
                 * POIS O USUARIO QUE TEM PERFIL DIFERENTE DE 1 SO PODE ALTERAR SEU PRÓPRIO REGISTRO
                 * */
                $registro ->save();
                \Session::flash('mensagem',['msg'=>'Registro Criado com sucesso!'
                    ,'class'=>'green white-text']);

                $enderecos= Endereco::where('pessoa_id', $request->pessoa_id)->get();

                return view('admins.pessoas.manter', compact('registro','enderecos'));

            }
            else
            {
                \Session::flash('mensagem',['msg'=>'Registro Não foi Criado Você não possue Credencial, contate um Administrador!'
                    ,'class'=>'green white-text']);

                return redirect()->route('home');
            }
        }
        else
        {

            \Session::flash('mensagem',['msg'=> 'O endereço já existe. Esperimente mudar o Tipo de Endereço!'
                ,'class'=>'red white-text']);

            return back()->withInput();
        }
    }
    public function showEntradaCEP($id)
    {
        $registro = Pessoa::find($id);
        $endereco = new Endereco();
        $endereco->pessoa_id = $id;
        return view('admins.pessoas.entradaCEP', compact('endereco', 'registro'));
    }

    public function atualizaPessoa(Request $request)
    {
        if(!auth()->user()->can('pessoa_editar'))
        {
            return redirect()->route('home');
        }
        $dados = $request->all();
        $registro = Pessoa::find($dados['id']);
        $enderecos= Endereco::where('pessoa_id', $registro->id)->get();
        $Papel_user = Papel_user::where('user_id', $registro->id)->first();
        //  var_dump($registro);
        //  dd($Papel_user->papel_id);

        $registro->cpf_cnpj = $dados['cpf_cnpj'];
        $registro->priName_Razao = $dados['priName_Razao'];
        $registro->lastName_Fantasia = $dados['lastName_Fantasia'];
        $registro->identidade_inscricaoEstadual = $dados['identidade_inscricaoEstadual'];
        $dt         = $this->transformDate($registro['data_nasc_Fundacao']);
        $registro->data_nasc_Fundacao         = $dt;

        if (strlen( $request['cpf_cnpj'])==11)
        {
            $registro->tipoPessoa="Fisica";
        }
        elseif (strlen( $request['cpf_cnpj'])==14)
        {
            $registro->tipoPessoa="Juridica";
        }

        if (!empty($enderecos)) $registro->status = 6;

        $file = $request->file('imagem');
        if($file)
        {
            $rand = rand(11111,99999);
            $diretorio = "img/pessoas/".$registro->cpf_cnpj;
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio,$nomeArquivo);
            $registro->imagem = $diretorio.'/'.$nomeArquivo;
        }

        if(($Papel_user->papel_id==1)||($Papel_user->papel_id==5))
        {
            $registro ->update();
            \Session::flash('mensagem',['msg'=>'Registro Atualizado com sucesso!'
                ,'class'=>'green white-text']);
            return view('admins.pessoas.manter', compact('registro', 'enderecos'));

        }
        else
        {
            \Session::flash('mensagem',['msg'=>'Registro Não Atualizado você não tem permissão contate o administrador!'
                ,'class'=>'green white-text']);

            return redirect()->route('home');
        }
    }

    public function show(Request $request)
    {
        //recupera pessoa
        $registro = Pessoa::find($request->id);
        //valida cpfcnpj
        $cpfcnpjtmp = $this->validate($request, [
            'cpf_cnpj' => 'required|cpf_cnpj',
        ]);
        $registro->cpf_cnpj=$request['cpf_cnpj'];
        //$registro->cpf_cnpj = $data['cpf_cnpj'];
        if (strlen( $request['cpf_cnpj'])=='11')
        {
            $registro->tipoPessoa="Fisica";
        } elseif (strlen( $request['cpf_cnpj'])=='14'){
            $registro->tipoPessoa="Juridica";
        }

        if (!$registro->status <= 6){ $registro->status = 4;}

        $Papel_user = Papel_user::where('user_id', $registro->id)->first();
        $papel=$Papel_user->papel_id;
        $enderecos = Endereco::where('pessoa_id', $request->id)->get();
        return view('admins.pessoas.manter', compact('registro','enderecos','papel'));
    }

    public function showEntradaCPF_CNPJ($id)
    {
        $papel_user = Papel_user::where('user_id', $id)->first();

        if(!auth()->user()->can('pessoa_editar'))
        {
            return redirect()->route('home');
        }

        if (($papel_user->papel_id == 1)||($papel_user->papel_id == 5))
        {
            $registro = Pessoa::find($id);
            $registro->status = 1;
            return view('admins.pessoas.entradaCPF_CNPJ', compact('registro','papel_user'));
        }
        else
        {
            \Session::flash('mensagem',['msg'=>'Função Não permitida. Você não possue Credenciais, contate um Administrador!'
                ,'class'=>'red white-text']);
            return redirect()->route('home');
        }

    }

    public function destroy($id)
    {
        if(!auth()->user()->can('pessoa_deletar'))
        {
            \Session::flash('mensagem',['msg'=>'Registro Não foi Deletado Você não possue Credenciais, contate um Administrador!'
                ,'class'=>'red white-text']);
            return redirect()->route('home');
        }

        $enderecos= Endereco::where('pessoa_id', $id)->get();

        if($enderecos)
        {
            foreach($enderecos as $endereco)
                $endereco->delete();
        }

        $registro = Pessoa::where('id', $id)->first(); // File::find($id)

        if($registro)
        {
            $registro->delete();
        }

        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!'
            ,'class'=>'green white-text']);

        $registros = Pessoa::orderBy('priName_Razao')->get();

        return redirect()->route('admins.pessoas');
    }


    public function index()
    {
        $email = Auth::user()->email;
        $registro = Pessoa::where('email', $email)->first();
        $Papel_user = Papel_user::where('user_id', $registro->id)->first();
        $papel=$Papel_user->papel_id;
        if($Papel_user->papel_id==5)
        {
            return redirect()->route('admins.pessoas.entradaCPF_CNPJ', $registro->id);
        }
        else
        {
            $registros = Pessoa::orderBy('priName_Razao')
                ->paginate(15);
            //->get();
            return view('admins.pessoas.index', compact('registros'));

        }
    }

    public function transformDate($value, $format = 'Y-m-d')
    {
        try {
            return \Carbon\Carbon::instance(
                \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value));

        } catch (\ErrorException $e)
        {
            return \Carbon\Carbon::createFromFormat($format, $value);
        }
    }
}
