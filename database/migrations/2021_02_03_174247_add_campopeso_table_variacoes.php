<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampopesoTableVariacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('variacoes', function (Blueprint $table) {
            $table->decimal('peso_liq', $precision = 5, $scale = 3);
            $table->decimal('peso_bruto', $precision = 5, $scale = 3);
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
            $table->dropColumn('peso_liq');
            $table->dropColumn('peso_bruto');
        });
    }
}
