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
            $table->string('sub_category');
            $table->string('descricao');
            $table->bigInteger('modelo_id')->unsigned();
            $table->bigInteger('colecao_id')->unsigned();
            $table->string('referencia');
            $table->string('genero');
            $table->string('composicao');
            $table->string('tipo_un');
            $table->string('palmilha')->nullable();
            $table->string('acessorios')->nullable();
            $table->string('salto')->nullable();
            $table->string('solado')->nullable();
            $table->string('imagem_capa')->nullable();
            $table->mediumText('imagems')->nullable();
            $table->string('directory')->nullable();
            $table->mediumText('descricaolonga')->nullable();
            $table->mediumText('detalhe')->nullable();
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
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
