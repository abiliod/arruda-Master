<?php

namespace Database\Seeders;


use App\Models\Admin\Papel;
use Illuminate\Database\Seeder;

class PapelTableSeeder extends Seeder{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run(){
        if(! Papel::where('nome','=','admin')->count()){
            Papel::create([
                'nome'=>'admin',
                'descricao'=>'Administrador do sistema'
            ]);
        }
        if(!Papel::where('nome','=','gerente')->count()){
            Papel::create([
                'nome'=>'gerente',
                'descricao'=>'Gerente do sistema'
            ]);
        }
        if(!Papel::where('nome','=','vendedor')->count()){
            Papel::create([
                'nome'=>'vendedor',
                'descricao'=>'Equipe de vendas'
            ]);
        }


        if(!Papel::where('nome','=','Representante')->count()){
            Papel::create([
                'nome'=>'Representante',
                'descricao'=>'Representante Equipe de vendas'
            ]);
        }

        if(!Papel::where('nome','=','Cliente/Fornecedor')->count()){
            Papel::create([
                'nome'=>'Cliente/Fornecedor',
                'descricao'=>'Cliente'
            ]);
        }

        echo "Papeis gerados com sucesso!\n";
    }
}

