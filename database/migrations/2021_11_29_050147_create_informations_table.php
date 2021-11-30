<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->id();
            $table->string('leadership')->nullable();
            $table->string('department')->nullable();
            $table->string('section')->nullable();
            $table->string('speciality')->nullable();
            $table->string('worker')->nullable();
            $table->integer('done')->nullable();
            $table->integer('executive_discipline')->nullable();
            $table->integer('initiative')->nullable();
            $table->integer('extra')->nullable();
            $table->integer('total')->nullable();
            $table->integer('kpi_per')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informations');
    }
}
