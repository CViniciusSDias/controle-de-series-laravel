<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OnCascadeDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('episodios', function (Blueprint $table) {
            $table->foreign('temporada_id')
                ->references('id')
                ->on('temporadas')
                ->onDelete('cascade');
        });

        Schema::table('temporadas', function (Blueprint $table) {
            $table->foreign('serie_id')
                ->references('id')
                ->on('series')
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
        Schema::table('episodios', function (Blueprint $table) {
            $table->foreign('temporada_id')
                ->references('id')
                ->on('temporadas');
        });

        Schema::table('temporadas', function (Blueprint $table) {
            $table->foreign('serie_id')
                ->references('id')
                ->on('series');
        });
    }
}
