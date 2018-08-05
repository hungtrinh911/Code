<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('things', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 500);
            $table->string('slug', 500);
            $table->string('featured_img', 500)->nullable();
            $table->string('excerpt', 1000)->nullable();
            $table->text('content')->nullable();
            $table->string('type', 20)->nullable();
            $table->integer('author')->default(0);
            $table->string('status', 20)->default('pending');
            $table->bigInteger('parent_id')->default(0);
            $table->bigInteger('order_index')->default(1);
            $table->text('metadata')->nullable();
            $table->string('locale', 5)->default(env('LOCALE_DEFAULT'));
            $table->bigInteger('locale_source_id')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('things');
    }
}
