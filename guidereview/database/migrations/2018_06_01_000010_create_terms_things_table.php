<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermsThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms_things', function (Blueprint $table) {
            $table->integer('term_id')->unsigned();
            $table->bigInteger('thing_id')->unsigned();
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('thing_id')->references('id')->on('things')->onDelete('cascade');
            $table->integer('order_index')->unsigned()->default(0);
            $table->primary(['term_id', 'thing_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('terms_things');
    }
}
