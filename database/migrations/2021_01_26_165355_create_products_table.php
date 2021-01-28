<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('modelo_id')->unsigned();  // [scarpin, ana bela, sapatilha, plataforma ,...]
            $table->bigInteger('colecao_id')->unsigned(); //  [LUXO,MARINA, JULIA ]
            $table->string('genero');  // masculino feminino unissex
            $table->string('descricao');
            $table->string('composicao'); // //[NOBUQUE, CAMURÇA, VERNIZ, NAPA FLORAL...]
            $table->string('referencia');
            $table->string('numeracao_br')->nullable(); //numero brasileiro
            $table->string('numeracao_eua')->nullable(); //numero equial
            $table->string('tamanho')->nullable();  // tamanho [medio,grande] ou em cm
            $table->string('altura')->nullable();  //  [baixo,medio, alto] ou em cm
            $table->string('cor'); // [ PRETO,BRANCO,MARFIM]
            $table->string('palmilha')->nullable(); // [CONFORT,TRADICIONAL PRETO BEJE MARFIM]
            $table->string('acessorios')->nullable(); // [extrais, spaike, ilhos, cardaço....]
            $table->string('salto')->nullable();    // [fino, bloco, taça,]
            $table->string('solado')->nullable();   // [ pvc, tr, sofort]
            $table->string('imagem')->nullable();
            $table->integer('desconto')->default(0);
            $table->integer('estoque')->default(0);
            $table->decimal('preco', 6, 2)->default(0);
            $table->mediumText('descricaolonga')->nullable();
            $table->mediumText('detalhe')->nullable();
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            //   $table->unsignedBigInteger('cliente_id');//altera a tabela como ja foi criado no evento anterior não precisa.
            $table->foreign('modelo_id')->references('id')->on('modelos');
            $table->foreign('colecao_id')->references('id')->on('colecaos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
