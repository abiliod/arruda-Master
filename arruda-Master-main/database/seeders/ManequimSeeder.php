<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManequimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manequims')->insert([
            ['produto_id'  =>  '1','tamanho_br'  =>  '4','cor'  =>  'Azul','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],
            ['produto_id'  =>  '1','tamanho_br'  =>  '4','cor'  =>  'Rosa','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],
            ['produto_id'  =>  '1','tamanho_br'  =>  '4','cor'  =>  'Vermelho','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],
            ['produto_id'  =>  '4','tamanho_br'  =>  '4','cor'  =>  'Azul','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],
            ['produto_id'  =>  '4','tamanho_br'  =>  '4','cor'  =>  'Azul','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],
            ['produto_id'  =>  '4','tamanho_br'  =>  '4','cor'  =>  'Azul','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],
            ['produto_id'  =>  '4','tamanho_br'  =>  '4','cor'  =>  'Azul','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],
            ['produto_id'  =>  '4','tamanho_br'  =>  '4','cor'  =>  'Azul','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],
            ['produto_id'  =>  '4','tamanho_br'  =>  '4','cor'  =>  'Azul','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],
            ['produto_id'  =>  '5','tamanho_br'  =>  '4','cor'  =>  'Azul','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],
            ['produto_id'  =>  '5','tamanho_br'  =>  '4','cor'  =>  'Azul','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],
            ['produto_id'  =>  '5','tamanho_br'  =>  '4','cor'  =>  'Azul','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],
            ['produto_id'  =>  '5','tamanho_br'  =>  '4','cor'  =>  'Azul','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],
            ['produto_id'  =>  '7','tamanho_br'  =>  '4','cor'  =>  'Azul','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],
            ['produto_id'  =>  '7','tamanho_br'  =>  '4','cor'  =>  'Azul','desconto'  =>  '4','estoque'   =>  '30','preco'  =>  '45.23'],

        ]);
        $this->command->info('Manequims importados com sucesso!');
    }
}
