<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagebuilder_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 256);
            $table->string('title', 256);
            $table->string('route', 512)->unique();
            $table->string('layout', 256);
            $table->longText('data')->nullable();
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
        Schema::dropIfExists('pagebuilder_pages');
    }
}
