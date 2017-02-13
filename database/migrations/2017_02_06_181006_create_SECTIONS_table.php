<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSECTIONSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SECTIONS', function (Blueprint $table) {
            $table->increments('ID_SECTION');
            $table->string('SECTIONNAME', 20)->nullable();
            $table->integer('SECTIONORDER')->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SECTIONS');
    }
}
