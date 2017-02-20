<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTEXTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('TEXTS', function (Blueprint $table) {
            $table->increments('ID_TEXT');
            $table->string('TEXTNAME', 30)->nullable();
            $table->integer('TEXTORDER')->nullable();
            $table->text('CONTENT')->nullable();
            $table->integer('RECYEAR')->nullable();
            $table->string('AUDIO', 255)->nullable();
            $table->integer('ID_COLLECTOR')->nullable();
            $table->integer('ID_CONTRACTOR')->nullable();
            $table->integer('ID_LOCATION')->nullable();
            $table->integer('ID_WORD')->nullable();
            $table->integer('ID_VILLAGE')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('TEXTS');
    }
}
