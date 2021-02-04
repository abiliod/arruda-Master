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
            $table->decimal('peso_liq', $precision = 8, $scale = 2);

            $table->decimal('peso_bruto', $precision = 8, $scale = 2);
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
