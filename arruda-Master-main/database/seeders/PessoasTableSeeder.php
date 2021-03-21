<?php
namespace Database\Seeders;

use App\Models\Pessoas\Pessoa;
use App\Models\User;
use Illuminate\Database\Seeder;

class PessoasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        if(Pessoa::where('email','=','admin@arruda.com.br')->count()){
            $pessoa = Pessoa::where('email','=','admin@arruda.com.br')->first();
            $pessoa->priName_Razao = "Arruda Calçados";
            $pessoa->email = "admin@arruda.com.br";
            $pessoa->save();
        }else{
            $pessoa = new Pessoa();
            $pessoa->priName_Razao = "Arruda Calçados";
            $pessoa->email = "admin@arruda.com.br";

            $pessoa->save();
        }
        echo "Inicializado o Cadastro para Pessoas com sucesso!\n";
   }

}

