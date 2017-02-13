<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCONTRACTORSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CONTRACTORS', function (Blueprint $table) {
            $table->increments('ID_CONTRACTOR');
            $table->string('CONTRACTORNAME', 40)->nullable();
            $table->integer('RYEAR')->nullable();
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
        Schema::dropIfExists('CONTRACTORS');
    }
}
