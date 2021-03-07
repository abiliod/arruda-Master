<?php

namespace Database\Seeders;

use App\Models\Admin\Papel;
use App\Models\Admin\PapelPermissao;
use App\Models\Admin\Permissao;
use Illuminate\Database\Seeder;



class PapelPermissaoTableSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $permissaos = Permissao::all();

        $papel = Papel::where('nome','=','admin')->first();
        foreach($permissaos as $permissao){
            PapelPermissao::firstOrCreate(
                ['permissao_id' => $permissao->id],
                ['papel_id' => $papel->id]
             );
        }

    }
}
