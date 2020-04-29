<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebmasterBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webmaster_banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('webmaster_id');
            $table->integer('row_no')->default(0);
            $table->string('banner_name',30);
            $table->integer('banner_type')->default(0);
            $table->integer('width')->default(0);
            $table->integer('height')->default(0);
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
        Schema::dropIfExists('webmaster_banners');
    }
}
