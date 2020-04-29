<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('flag_id')->default(0);
            $table->string('banner_slug',120);
            $table->string('banner_title',80);
            $table->string('banner_description',140);
            $table->string('banner_meta',180)->nullable();
            $table->string('banner_meta_description',180)->nullable();
            $table->string('banner_abstract',180)->nullable();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('banners');
    }
}
