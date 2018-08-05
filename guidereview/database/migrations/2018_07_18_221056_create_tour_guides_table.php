<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourGuidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_guides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',500);
            $table->string('email',500);
            $table->string('dob',500)->nullable();
            $table->string('sex',20)->nullable();
            $table->string('status',20)->nullable();
            $table->string('img_full',500)->nullable();
            $table->string('img_cd',500)->nullable();
            $table->string('img_cv',500)->nullable();
            $table->string('hot_tourguide',5)->default(0);
            $table->string('people_id',20)->nullable();
            $table->string('passpost',20)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('city',500)->nullable();
            $table->string('address',500)->nullable();
            $table->longText('language',500)->nullable();
            $table->string('class',500)->nullable();
            $table->string('LicensedType',500)->nullable();
            $table->string('join_date',500)->nullable();
            $table->string('card_id',500)->nullable();
            $table->string('date_start',500)->nullable();
            $table->string('date_end',500)->nullable();
            $table->longText('locale_1')->nullable();
            $table->longText('locale_2')->nullable();
            $table->longText('introduce')->nullable();
            $table->longText('certificate')->nullable();
            

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
        Schema::dropIfExists('tour_guides');
    }
}
