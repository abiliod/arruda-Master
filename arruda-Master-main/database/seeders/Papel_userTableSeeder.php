<?php



namespace Database\Seeders;


use App\Models\Admin\Papel_user;
use Illuminate\Database\Seeder;

class Papel_userTableSeeder extends Seeder {
    /**
    * Run the database seeds.
    *Abilio 20-02-2020  atribuir papel admin ao primeiro usuario do sistema usuário
    * @return void
    */
    public function run(){

        if(! Papel_user::where('user_id', '=', '1' )
            ->where('papel_id', '=', '1')->count())

            Papel_user::create([
                'user_id'=>'1',
                'papel_id'=>'1'
            ]);
            echo "Papeis para Usuários criados com sucesso!\n";
        }
}
