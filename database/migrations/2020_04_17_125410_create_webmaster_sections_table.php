<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebmasterSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webmaster_sections', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('row_no')->default(0);
            $table->string('section_name',30);
            $table->string('section_description',120)->nullable();
            $table->integer('section_type')->default(0);
            $table->integer('section_category')->default(0);
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
        Schema::dropIfExists('webmaster_sections');
    }
}
