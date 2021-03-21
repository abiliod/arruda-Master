<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Papel;
use App\Models\Admin\Permissao;
use Illuminate\Http\Request;

class PapelController extends Controller
{
    public function index(){
        if(! auth()->user()->can('papel_listar')){
            return redirect()->route('home');
        }
        $registros = Papel::all();
        return view('admins.papel.index',compact('registros'));
    }
    public function adicionar()
    {
        if(!auth()->user()->can('papel_adicionar')){
            return redirect()->route('home');
        }
        return view('admins.papel.adicionar');
    }
    public function salvar(Request $request)
    {
        if(!auth()->user()->can('papel_adicionar')){
            return redirect()->route('home');
        }
        Papel::create($request->all());
        return redirect()->route('admins.papel');
    }
    public function editar($id)
    {
        if(!auth()->user()->can('papel_editar')){
            return redirect()->route('home');
        }
        if(Papel::find($id)->nome == "admins"){
            return redirect()->route('admins.papel');
        }
        $registro = Papel::find($id);
        return view('admins.papel.editar',compact('registro'));
    }
    public function atualizar(Request $request,$id){
        if(!auth()->user()->can('papel_editar')){
            return redirect()->route('home');
        }
        if(Papel::find($id)->nome == "admins"){
            return redirect()->route('admins.papel');
        }
        Papel::find($id)->update($request->all());
        return redirect()->route('admins.papel');
    }
    public function deletar($id)
    {
        if(!auth()->user()->can('papel_deletar')){
            return redirect()->route('home');
        }
        if(Papel::find($id)->nome == "admins"){
            return redirect()->route('admins.papel');
        }
        Papel::find($id)->delete();
        return redirect()->route('admins.papel');
    }

    public function permissao($id)
    {
        if(!auth()->user()->can('papel_editar')){
            return redirect()->route('home');
        }
        $papel = Papel::find($id);
        $permissao = Permissao::all();
        return view('admins.papel.permissao',compact('papel','permissao'));
    }
    public function salvarPermissao(Request $request, $id)
    {
        if(!auth()->user()->can('papel_editar')){
            return redirect()->route('home');
        }
        $papel = Papel::find($id);
        $permissao = Permissao::find($request['permissao_id']);
        $papel->adicionarPermissao($permissao);
        return redirect()->back();
    }

    public function removerPermissao($id,$id_permissao)
    {
        if(!auth()->user()->can('papel_editar')){
            return redirect()->route('home');
        }
        $papel = Papel::find($id);
        $permissao = Permissao::find($id_permissao);
        $papel->removerPermissao($permissao);

        return redirect()->back();
    }
}
