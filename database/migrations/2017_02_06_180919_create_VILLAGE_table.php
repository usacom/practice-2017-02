<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVILLAGETable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('VILLAGE', function (Blueprint $table) {
            $table->increments('ID_VILLAGE');
            $table->string('VILLAGENAME', 40)->nullable();
            $table->integer('ID_COUNTRY')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('VILLAGE');
    }
}
