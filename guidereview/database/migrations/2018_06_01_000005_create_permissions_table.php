<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 50);     // Ex: add-user
            $table->string('name', 100);     // Ex: Add User
            $table->bigInteger('thing_id')->unsigned();
            $table->string('locale', 5)->default(env('LOCALE_DEFAULT'));
            $table->timestamps();
            $table->foreign('thing_id')->references('id')->on('things')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
