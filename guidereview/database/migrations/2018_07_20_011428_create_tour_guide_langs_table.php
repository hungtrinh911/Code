<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourGuideLangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_guide_langs', function (Blueprint $table) {
            $table->integer('id_tourguide')->unsigned();;
            $table->integer('id_language')->unsigned();;
            $table->foreign('id_tourguide')->references('id')->on('tour_guides')->onDelete('cascade');
            $table->foreign('id_language')->references('id')->on('languages')->onDelete('cascade');
            $table->primary(['id_language', 'id_tourguide']);
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
        Schema::dropIfExists('tour_guide_langs');
    }
}
