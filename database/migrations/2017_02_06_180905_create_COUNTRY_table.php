<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCOUNTRYTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('COUNTRY', function (Blueprint $table) {
            $table->increments('ID_COUNTRY');
            $table->string('COUNTRYNAME', 40)->nullable();
            $table->integer('ID_AREA')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('COUNTRY');
    }
}
