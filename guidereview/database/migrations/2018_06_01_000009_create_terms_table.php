<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('terms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 500);
            $table->string('slug', 500);
            $table->string('type', 20)->nullable();
            $table->integer('parent_id')->default(0);
            $table->string('icon', 500)->nullable();
            $table->integer('thing_count')->default(0);
            $table->string('status', 20)->default('pending');
            $table->text('metadata')->nullable();
            $table->string('locale', 5)->default(env('LOCALE_DEFAULT'));
            $table->integer('locale_source_id')->default(0);
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
        Schema::dropIfExists('terms');
    }
}
