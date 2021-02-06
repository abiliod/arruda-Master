<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampoTableVariacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('variacoes', function (Blueprint $table) {

            $table->string('imagem_product', 191)->nullable()->after('produto_id');
            $table->string('directory_product', 191)->nullable()->after('imagem_product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('variacoes', function (Blueprint $table) {
            $table->dropColumn('directory_product');
            $table->dropColumn('imagem_product');
        });
    }
}
