<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variacoes', function (Blueprint $table) {
            /*opções da tabela*/
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            /*criando colunas*/
            $table->id();
            $table->bigInteger('produto_id')->unsigned();
            $table->string('tamanho_br'); //numero brasileiro
            $table->string('tamanho_eua')->nullable(); //numero equial
            $table->string('altura')->nullable();  //  [baixo,medio, alto] ou em cm
            $table->string('cor'); // [ PRETO,BRANCO,MARFIM]
            $table->integer('estoque')->default(0);
            $table->decimal('preco', 6, 2)->default(0);
            $table->integer('desconto')->default(0);
            $table->timestamps();
        });

        Schema::table('variacoes', function (Blueprint $table)
        {
            $table->foreign('produto_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variacoes');
    }
}
