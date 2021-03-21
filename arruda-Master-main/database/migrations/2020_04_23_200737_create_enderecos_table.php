<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateEnderecosTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {

        Schema::create('enderecos', function (Blueprint $table) {

            $table->id();
            $table->string('cep');
            $table->string('estado')->nullable();//pode ser nulo
            $table->string('cidade')->nullable();//pode ser nulo;
            $table->string('bairro')->nullable();//pode ser nulo;
            $table->string('logradouro')->nullable();//pode ser nulo;
            $table->string('numero')->nullable();//pode ser nulo;
            $table->string('complemento')->nullable();//pode ser nulo;
            $table->enum('tipo',['Comercial','Residencial','Entrega'])->default('Comercial');
            $table->bigInteger('pessoa_id')->unsigned()->default(0);
            $table->timestamps();
        });

        Schema::table('enderecos', function (Blueprint $table) {

               $table->foreign('pessoa_id')->references('id')->on('pessoas');
               $table->index(['pessoa_id','tipo']);

       });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('enderecos');
    }
}
