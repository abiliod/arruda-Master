<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePessoasTable extends Migration{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pessoas', function (Blueprint $table) {

            $table->id();
            $table->string('cpf_cnpj')->nullable();//pode ser nulo
            $table->enum('tipoPessoa', ['Fisica', 'Juridica'])->nullable();//pode ser nulo
            $table->string('priName_Razao');
            $table->string('lastName_Fantasia')->nullable();//pode ser nulo
            $table->string('identidade_inscricaoEstadual')->nullable();//pode ser nulo
            $table->string('data_nasc_Fundacao')->nullable();//pode ser nulo
            $table->string('email')->unique();//pode ser nulo
            $table->string('sexo')->default("PrefiroNãoResponder");//pode ser nulo
            $table->string('imagem')->nullable();//pode ser nulo
            $table->integer('status')->default(0);
            $table->string('imagemCPF_CNPJ')->nullable();//pode ser nulo
            $table->timestamps();
    });
      
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('pessoas');
     //   Schema::dropIfExists('enderecos');
    }
}