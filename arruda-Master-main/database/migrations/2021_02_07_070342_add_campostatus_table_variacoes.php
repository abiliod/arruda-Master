<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCampostatusTableVariacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('variacoes', function (Blueprint $table) {
            $table->enum('status',['vende','aluga'])->after('cor');
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
            $table->dropColumn('status');
        });
    }
}
