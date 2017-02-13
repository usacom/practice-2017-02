<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWORDSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('WORDS', function (Blueprint $table) {
        $table->increments('ID_WORD');
        $table->string('WORDNAME', 30)->nullable();
        $table->text('DESCRIPTION')->nullable();
        $table->integer('WORDORDER')->nullable();
        $table->integer('ID_SECTION')->nullable();
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('WORDS');
    }
}
