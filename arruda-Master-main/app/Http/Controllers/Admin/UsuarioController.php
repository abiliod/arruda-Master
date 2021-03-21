<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Papel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::logout();
        return redirect()->route('/');

    }

    public function adicionar()
    {
        if(!auth()->user()->can('usuario_adicionar'))
        {
            return redirect()->route('home');
        }
        return view('admins.usuarios.adicionar');
    }

    public function salvar(Request $request)
    {
        if(!auth()->user()->can('usuario_adicionar'))
        {
            return redirect()->route('home');
        }
        $dados = $request->all();
        $usuario = new User();
        $usuario->name = $dados['name'];
        $usuario->email = $dados['email'];
        $usuario->password = bcrypt($dados['password']);
        $usuario->save();
        \Session::flash('mensagem',['msg'=>'Registro criado com sucesso!','class'=>'green white-text']);
        return redirect()->route('admins.usuarios');
    }

    public function editar($id)
    {
        if(!auth()->user()->can('usuario_editar'))
        {
            return redirect()->route('home');
        }
        $usuario = User::find($id);
        return view('admins.usuarios.editar', compact('usuario'));
    }

    public function atualizar(Request $request, $id)
    {
        if(!auth()->user()->can('usuario_editar'))
        {
            return redirect()->route('home');
        }
        $usuario = User::find($id);
        $dados = $request->all();
        if(isset($dados['password']) && strlen($dados['password']) > 5 )
        {
            $dados['password'] = bcrypt($dados['password']);
        }
        else
        {
            unset($dados['password']);
        }

        $usuario ->update($dados);
        \Session::flash('mensagem',['msg'=>'Registro atualizado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admins.usuarios');
    }

    public function deletar($id)
    {
        if(!auth()->user()->can('usuario_deletar'))
        {
            return redirect()->route('home');
        }
        User::find($id)->delete();

        \Session::flash('mensagem',['msg'=>'Registro deletado com sucesso!','class'=>'green white-text']);

        return redirect()->route('admins.usuarios');

    }

    public function login(Request $request)
    {
        $dados = $request->all();
        if(Auth::attempt(['email'=>$dados['email'],'password'=>$dados['password']])){


            \Session::flash('mensagem',['msg'=>'Login realizado com sucesso!'
                ,'class'=>'green white-text']);
            return redirect()->route('admins.principal');
        }

        \Session::flash('mensagem',['msg'=>'Erro! Confira seus dados.'
            ,'class'=>'red white-text']);

        return redirect()->route('admins.login');
    }

    public function papel($id)
    {
        if(!auth()->user()->can('usuario_editar'))
        {
            return redirect()->route('home');
        }

        $usuario = User::find($id);
        $papel = Papel::all();
        return view('admins.usuarios.papel',compact('usuario','papel'));
    }

    public function salvarPapel(Request $request,$id)
    {
        if(! auth()->user()->can('usuario_editar'))
        {
            return redirect()->route('home');
        }


        $usuario = User::find($id);
        $dados = $request->all();
        $papel = Papel::find($dados['papel_id']);
//        dd('papel '.$papel, 'usuario '.$usuario  );
        try {
            $usuario->adicionaPapel($papel);
        }catch (\Exception $e){
            \Session::flash('mensagem',['msg'=>'Papel já existe para o usuário.'
                ,'class'=>'red white-text']);
        }
        return redirect()->back();
    }

    public function removerPapel($id,$papel_id)
    {
        if(!auth()->user()->can('usuario_editar'))
        {
            return redirect()->route('home');
        }
        $usuario = User::find($id);
        $papel = Papel::find($papel_id);
        $usuario->removePapel($papel);
        return redirect()->back();
    }

    public function search (Request $request )
    {
        if(auth()->user()->can('usuario_listar'))
        {
            if ($request->all()['search']==NULL){
                \Session::flash('mensagem',['msg'=>'Para Filtrar ao menos um parâmetro é necessário.'
                    ,'class'=>'red white-text']);
                return redirect()->back();
            }
            $usuarios = DB::table('users')
                ->select('users.*')
                ->where('name', 'like', '%' . trim($request->all()['search']) . '%')  //trim($registro->descricao)
                ->orWhere([['document', '=', $request->all()['search']]])
                ->orWhere([['businessUnit', '=', $request->all()['search']]])
                ->orderBy('name' , 'asc')
                ->paginate(10);
            return view('admins.usuarios.index',compact('usuarios'));
        }
        else
        {
            return redirect()->route('home');
        }
    }

    public function index()
    {

        if(auth()->user()->can('usuario_listar'))
        {
            $papel_user = DB::table('papel_user')
                ->Where([['user_id', '=', auth()->user()->id]])
                ->Where([['papel_id', '=', 1]])
                ->select('papel_id')
                ->first();
            if($papel_user->papel_id == 1)
            {
                $usuarios = DB::table('users')
                    ->select('users.*')
                    ->orderBy('name' , 'asc')
                ->paginate(10);
            }
            else
            {
                \Session::flash('mensagem',['msg'=>'Função não autorizada para o seu perfil de acesso. Contate o administrador'
                    ,'class'=>'red white-text']);
                return redirect()->route('home');
            }

            return view('admins.usuarios.index',compact('usuarios'));
        }
        else
        {
            return redirect()->route('home');
        }
    }
}
