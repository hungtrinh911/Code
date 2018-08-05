<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourGuideFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_guide_fields', function (Blueprint $table) {
            $table->integer('id_tourguide')->unsigned();;
            $table->integer('id_fields')->unsigned();;
            $table->foreign('id_tourguide')->references('id')->on('tour_guides')->onDelete('cascade');
            $table->foreign('id_fields')->references('id')->on('field_guides')->onDelete('cascade');
            $table->primary(['id_fields', 'id_tourguide']);
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
        Schema::dropIfExists('tour_guide_fields');
    }

}
