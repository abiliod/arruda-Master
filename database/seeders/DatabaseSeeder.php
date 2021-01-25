<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // inclusao de Paginas Administrativas Sobre e Contato

        $this->call([
          //  PaginasTableSeeder::class,
            ProductSeeder::class,

        ]);


        //Imagens iniciais para Pagina Slider Administrativas
    //    $this->call(SlidesTableSeeder::class);
    }
}
