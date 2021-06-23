<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterComicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_comic', function (Blueprint $table) {
            $table->bigInteger('character_id')->unsigned();
            $table->foreign('character_id')->references('id')->on('characters')->onDelete('restrict')->onUpdate('cascade');
            $table->bigInteger('comic_id')->unsigned();
            $table->foreign('comic_id')->references('id')->on('comics')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('character_comic');
    }
}
