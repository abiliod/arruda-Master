<?php

namespace Database\Seeders;


use App\Models\Admin\Permissao;
use Illuminate\Database\Seeder;

class PermissaoTableSeeder extends Seeder {
/**
* Run the database seeds.
*
* @return void
*/
public function run() {

    if(!Permissao::where('nome','=','usuario_listar')->count()) {
        Permissao::create([
            'nome'=>'usuario_listar',
            'descricao'=>'Listar Usuários'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','usuario_listar')->first();
        $permissao->update([
            'nome'=>'usuario_listar',
            'descricao'=>'Listar Usuários'
        ]);
    }

    if(!Permissao::where('nome','=','usuario_adicionar')->count()) {
        Permissao::create([
            'nome'=>'usuario_adicionar',
            'descricao'=>'Adicionar Usuários'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','usuario_adicionar')->first();
        $permissao->update([
            'nome'=>'usuario_adicionar',
            'descricao'=>'Adicionar Usuários'
        ]);
    }

    if(!Permissao::where('nome','=','usuario_editar')->count()) {
        Permissao::create([
            'nome'=>'usuario_editar',
            'descricao'=>'Editar Usuários'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','usuario_editar')->first();
        $permissao->update([
            'nome'=>'usuario_editar',
            'descricao'=>'Editar Usuários'
        ]);
    }

    if(!Permissao::where('nome','=','usuario_deletar')->count()) {
        Permissao::create([
            'nome'=>'usuario_deletar',
            'descricao'=>'Deletar Usuários'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','usuario_deletar')->first();
        $permissao->update([
            'nome'=>'usuario_deletar',
            'descricao'=>'Deletar Usuários'
        ]);
    }

    if(!Permissao::where('nome','=','papel_listar')->count()) {
        Permissao::create([
            'nome'=>'papel_listar',
            'descricao'=>'Listar Papéis'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','papel_listar')->first();
        $permissao->update([
            'nome'=>'papel_listar',
            'descricao'=>'Listar Papéis'
        ]);
    }

    if(!Permissao::where('nome','=','papel_adicionar')->count()) {
        Permissao::create([
            'nome'=>'papel_adicionar',
            'descricao'=>'Adicionar Papéis'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','papel_adicionar')->first();
        $permissao->update([
            'nome'=>'papel_adicionar',
            'descricao'=>'Adicionar Papéis'
        ]);
    }

    if(!Permissao::where('nome','=','papel_editar')->count()) {
        Permissao::create([
            'nome'=>'papel_editar',
            'descricao'=>'Editar Papéis'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','papel_editar')->first();
        $permissao->update([
            'nome'=>'papel_editar',
            'descricao'=>'Editar Papéis'
        ]);
    }

    if(!Permissao::where('nome','=','papel_deletar')->count()) {
        Permissao::create([
            'nome'=>'papel_deletar',
            'descricao'=>'Deletar Papéis'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','papel_deletar')->first();
        $permissao->update([
            'nome'=>'papel_deletar',
            'descricao'=>'Deletar Papéis'
        ]);
    }

    if(!Permissao::where('nome','=','pagina_listar')->count()) {
        Permissao::create([
            'nome'=>'pagina_listar',
            'descricao'=>'Listar Página'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','pagina_listar')->first();
        $permissao->update([
            'nome'=>'pagina_listar',
            'descricao'=>'Listar Página'
        ]);
    }

    if(!Permissao::where('nome','=','pagina_adicionar')->count()) {
        Permissao::create([
            'nome'=>'pagina_adicionar',
            'descricao'=>'Adicionar Página'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','pagina_adicionar')->first();
        $permissao->update([
            'nome'=>'pagina_adicionar',
            'descricao'=>'Adicionar Página'
        ]);
    }

    if(!Permissao::where('nome','=','pagina_editar')->count()) {
        Permissao::create([
            'nome'=>'pagina_editar',
            'descricao'=>'Editar Página'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','pagina_editar')->first();
        $permissao->update([
            'nome'=>'pagina_editar',
            'descricao'=>'Editar Página'
        ]);
    }

    if(!Permissao::where('nome','=','pagina_deletar')->count()) {
        Permissao::create([
            'nome'=>'pagina_deletar',
            'descricao'=>'Deletar Página'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','pagina_deletar')->first();
        $permissao->update([
            'nome'=>'pagina_deletar',
            'descricao'=>'Deletar Página'
        ]);
    }

    // 28/02/2020 inicio permissões para Slides
    if(!Permissao::where('nome','=','slide_listar')->count()) {
        Permissao::create([
            'nome'=>'slide_listar',
            'descricao'=>'Listar Slide'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','slide_listar')->first();
        $permissao->update([
            'nome'=>'slide_listar',
            'descricao'=>'Listar Slide'
        ]);
    }

    if(!Permissao::where('nome','=','slide_adicionar')->count()) {
        Permissao::create([
            'nome'=>'slide_adicionar',
            'descricao'=>'Adicionar Slide'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','slide_adicionar')->first();
        $permissao->update([
            'nome'=>'slide_adicionar',
            'descricao'=>'Adicionar Slide'
        ]);
    }

    if(!Permissao::where('nome','=','slide_editar')->count()) {
        Permissao::create([
            'nome'=>'slide_editar',
            'descricao'=>'Editar Slide'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','slide_editar')->first();
        $permissao->update([
            'nome'=>'slide_editar',
            'descricao'=>'Editar Slide'
        ]);
    }

    if(!Permissao::where('nome','=','slide_deletar')->count()) {
        Permissao::create([
            'nome'=>'slide_deletar',
            'descricao'=>'Deletar Slide'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','slide_deletar')->first();
        $permissao->update([
            'nome'=>'slide_deletar',
            'descricao'=>'Deletar Slide'
        ]);
    }
// 28/02/2020 fim permissões para Slides

// 14/04/2020  permissões para pessoas
    if(!Permissao::where('nome','=','pessoa_listar')->count()) {
        Permissao::create([
            'nome'=>'pessoa_listar',
            'descricao'=>'Listar Pessoas'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','pessoa_listar')->first();
        $permissao->update([
            'nome'=>'pessoa_listar',
            'descricao'=>'Listar Pessoas'
        ]);
    }

    if(!Permissao::where('nome','=','pessoa_adicionar')->count()) {
        Permissao::create([
            'nome'=>'pessoa_adicionar',
            'descricao'=>'Adicionar Pessoas'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','pessoa_adicionar')->first();
        $permissao->update([
            'nome'=>'pessoa_adicionar',
            'descricao'=>'Adicionar Pessoas'
        ]);
    }

    if(!Permissao::where('nome','=','pessoa_editar')->count()) {
        Permissao::create([
            'nome'=>'pessoa_editar',
            'descricao'=>'Editar Pessoas'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','pessoa_editar')->first();
        $permissao->update([
            'nome'=>'pessoa_editar',
            'descricao'=>'Editar Pessoas'
        ]);
    }

    if(!Permissao::where('nome','=','pessoa_deletar')->count()) {
        Permissao::create([
            'nome'=>'pessoa_deletar',
            'descricao'=>'Deletar Pessoas'
        ]);
    }else{
        $permissao = Permissao::where('nome','=','pessoa_deletar')->first();
        $permissao->update([
           'nome'=>'pessoa_deletar',
           'descricao'=>'Deletar Pessoas'
        ]);
    }
            // 14/04/2020  fim permissões para pessoas

        // 14/04/2020  permissões para cidades
//        if(!Permissao::where('nome','=','cidade_listar')->count()) {
//            Permissao::create([
//                'nome'=>'cidade_listar',
//                'descricao'=>'Listar Cidades'
//            ]);
//        }else{
//            $permissao = Permissao::where('nome','=','cidade_listar')->first();
//            $permissao->update([
//                'nome'=>'cidade_listar',
//                'descricao'=>'Listar Cidades'
//            ]);
//        }
//
//        if(!Permissao::where('nome','=','cidades_adicionar')->count()) {
//            Permissao::create([
//                'nome'=>'cidade_adicionar',
//                'descricao'=>'Adicionar Cidades'
//            ]);
//        }else{
//            $permissao = Permissao::where('nome','=','cidade_adicionar')->first();
//            $permissao->update([
//                'nome'=>'cidade_adicionar',
//                'descricao'=>'Adicionar Cidades'
//            ]);
//        }
//
//        if(!Permissao::where('nome','=','cidade_editar')->count()) {
//            Permissao::create([
//                'nome'=>'cidade_editar',
//                'descricao'=>'Editar Cidades'
//            ]);
//        }else{
//            $permissao = Permissao::where('nome','=','cidade_editar')->first();
//            $permissao->update([
//                'nome'=>'cidade_editar',
//                'descricao'=>'Editar Cidades'
//            ]);
//        }
//
//        if(!Permissao::where('nome','=','cidade_deletar')->count()) {
//            Permissao::create([
//                'nome'=>'cidade_deletar',
//                'descricao'=>'Deletar Cidades'
//            ]);
//        }else{
//            $permissao = Permissao::where('nome','=','cidade_deletar')->first();
//            $permissao->update([
//            'nome'=>'cidade_deletar',
//            'descricao'=>'Deletar Cidades'
//            ]);
//        }
//

                echo "Permissões geradas com sucesso!\n";
    }
}
