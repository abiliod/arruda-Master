<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['genero'  =>  'masculino','tipo_un'  =>  'Par','sub_category'  =>  'Calçados','descricao'  =>  'teste1','composicao'  =>  'NOBUQUE','referencia'  =>  'DTFT53','colecao_id'  =>  '1','palmilha'  =>  'CONFORT','modelo_id'      =>  '1','acessorios'  =>  'extrais','salto'  =>  'fino','solado'   =>  'pvc','descricaolonga'   =>  'Qualquer justificativa que alimente as informações necessárias','detalhe'  =>  'Qualquer justificativa que alimente as informações necessárias para a fabricação do produto'],
            ['genero'  =>  'feminino','tipo_un'  =>  'Par','sub_category'  =>  'Calçados','descricao'   =>  'teste2','composicao'  =>  'CAMURÇA','referencia'  =>  'DTFT54','colecao_id'  =>  '2','palmilha'     =>  'TRADICIONAL','modelo_id'  =>  '2','acessorios'  =>  'spaike','salto'   =>  'bloco','solado'  =>  'tr','descricaolonga'   =>  'Qualquer justificativa que alimente as informações necessárias','detalhe'  =>  'Qualquer justificativa que alimente as informações necessárias para a fabricação do produto'],
            ['genero'  =>  'unissex','tipo_un'  =>  'Par','sub_category'  =>  'Calçados','descricao'    =>  'teste3','composicao'  =>  'VERNIZ','referencia'   =>  'DTFT55','colecao_id'  =>  '3','palmilha'    =>  'PRETO','modelo_id'        =>  '3','acessorios' =>  'ilhos','salto'    =>  'taça','solado'   =>  'sofort','descricaolonga'  =>  'Qualquer justificativa que alimente as informações necessárias','detalhe'  =>  'Qualquer justificativa que alimente as informações necessárias para a fabricação do produto'],
            ['genero'  =>  'masculino','tipo_un'  =>  'Par','sub_category'  =>  'Calçados','descricao'  =>  'teste4','composicao'  =>  'NAPA','referencia'     =>  'DTFT56','colecao_id'  =>  '4','palmilha'   =>  'BEJE','modelo_id'         =>  '4','acessorios'  =>  'cardaço','salto'  =>  'fino','solado'   =>  'pvc','descricaolonga'  =>  'Qualquer justificativa que alimente as informações necessárias','detalhe'  =>  'Qualquer justificativa que alimente as informações necessárias para a fabricação do produto'],
            ['genero'  =>  'feminino','tipo_un'  =>  'Par','sub_category'  =>  'Calçados','descricao'   =>  'teste5','composicao'  =>  'FLORA','referencia'    =>  'DTFT57','colecao_id'  =>  '1','palmilha'    =>  'MARFIM','modelo_id'       =>  '2','acessorios'  =>  'extrais','salto'  =>  'bloco','solado'  =>  'tr','descricaolonga'  =>  'Qualquer justificativa que alimente as informações necessárias','detalhe'  =>  'Qualquer justificativa que alimente as informações necessárias para a fabricação do produto'],
            ['genero'  =>  'unissex','tipo_un'  =>  'Par','sub_category'  =>  'Calçados','descricao'    =>  'teste6','composicao'  =>  'NOBUQUE','referencia'  =>  'DTFT58','colecao_id'  =>  '2','palmilha'     =>  'CONFORT','modelo_id'      =>  '1','acessorios'  =>  'spaike','salto'   =>  'taça','solado'   =>  'sofort','descricaolonga'  =>  'Qualquer justificativa que alimente as informações necessárias','detalhe'  =>  'Qualquer justificativa que alimente as informações necessárias para a fabricação do produto'],
            ['genero'  =>  'masculino','tipo_un'  =>  'Par','sub_category'  =>  'Calçados','descricao'  =>  'teste7','composicao'  =>  'CAMURÇA','referencia'  =>  'DTFT59','colecao_id'  =>  '3','palmilha'    =>  'TRADICIONAL','modelo_id'  =>  '2','acessorios'  =>  'ilhos','salto'    =>  'fino','solado'   =>  'pvc','descricaolonga'  =>  'Qualquer justificativa que alimente as informações necessárias','detalhe'  =>  'Qualquer justificativa que alimente as informações necessárias para a fabricação do produto'],
            ['genero'  =>  'feminino','tipo_un'  =>  'Par','sub_category'  =>  'Calçados','descricao'   =>  'teste8','composicao'  =>  'VERNIZ','referencia'   =>  'DTFT60','colecao_id'  =>  '4','palmilha'    =>  'PRETO','modelo_id'        =>  '3','acessorios'  =>  'cardaço','salto'  =>  'bloco','solado'  =>  'tr','descricaolonga'  =>  'Qualquer justificativa que alimente as informações necessárias','detalhe'  =>  'Qualquer justificativa que alimente as informações necessárias para a fabricação do produto'],
            ['genero'  =>  'unissex','tipo_un'  =>  'Par','sub_category'  =>  'Calçados','descricao'    =>  'teste9','composicao'  =>  'NAPA','referencia'     =>  'DTFT61','colecao_id'  =>  '3','palmilha'    =>  'BEJE','modelo_id'         =>  '4','acessorios'  =>  'extrais','salto'  =>  'taça','solado'   =>  'sofort','descricaolonga'  =>  'Qualquer justificativa que alimente as informações necessárias','detalhe'  =>  'Qualquer justificativa que alimente as informações necessárias para a fabricação do produto'],
            ['genero'  =>  'masculino','tipo_un'  =>  'Par','sub_category'  =>  'Calçados','descricao'  =>  'teste10','composicao' =>  'FLORA','referencia'    =>  'DTFT62','colecao_id'  =>  '2','palmilha'    =>  'MARFIM','modelo_id'       =>  '3','acessorios'  =>  'spaike','salto'   =>  'fino','solado'   =>  'pvc','descricaolonga'   =>  'Qualquer justificativa que alimente as informações necessárias','detalhe'  =>  'Qualquer justificativa que alimente as informações necessárias para a fabricação do produto']
        ]);
        $this->command->info('Products importados com sucesso!');
    }
}
