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
            $table->string('genero');  // masculino feminino unissex
            $table->string('descricao');
            $table->string('composicao'); // //[NOBUQUE, CAMURÇA, VERNIZ, NAPA FLORAL...]
            $table->string('referencia');
            $table->string('colecao'); //  [LUXO,MARINA, JULIA ]
            $table->string('numero_br'); //numero brasileiro
            $table->string('numero_eua')->nullable(); //numero equial
            $table->string('tamanho')->nullable();  // tamanho [medio,grande] ou em cm
            $table->string('altura')->nullable();  //  [baixo,medio, alto] ou em cm
            $table->string('cor'); // [ PRETO,BRANCO,MARFIM]
            $table->string('palmilha')->nullable(); // [CONFORT,TRADICIONAL PRETO BEJE MARFIM]
            $table->string('modelo')->nullable();  // [scarpin, ana bela, sapatilha, plataforma ,...]
            $table->string('acessorios')->nullable(); // [extrais, spaike, ilhos, cardaço....]
            $table->string('salto')->nullable();    // [fino, bloco, taça,]
            $table->string('solado')->nullable();   // [ pvc, tr, sofort]
            $table->string('imagem');
            $table->integer('desconto')->default(0);
            $table->integer('estoque')->default(0);
            $table->decimal('preco', 6, 2)->default(0);
            $table->mediumText('descricaolonga');
            $table->mediumText('detalhe');
            $table->timestamps();
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
