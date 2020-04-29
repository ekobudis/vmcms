<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('menu_item_id');
            $table->string('slug',120);
            $table->string('title',80);
            $table->string('title_2',60)->nullable();
            $table->string('short_content',140)->nullable();
            $table->text('page_content')->nullable();
            $table->string('location',60)->nullable();
            $table->integer('section_id')->default(0);
            $table->date('page_date')->nullable();
            $table->string('photo_filename',30)->nullable();
            $table->string('page_meta',120)->nullable();
            $table->string('page_description',180)->nullable();
            $table->string('page_abstract',120)->nullable();
            $table->integer('page_visit')->default(0);
            $table->integer('client_id')->default(0);
            $table->integer('status');
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
        Schema::dropIfExists('pages');
    }
}
