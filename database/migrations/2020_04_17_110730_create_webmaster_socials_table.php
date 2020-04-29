<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebmasterSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webmaster_socials', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('webmaster_id');
            $table->string('social_name',30);
            $table->string('social_uuid',70)->nullable();
            $table->string('social_codename',70)->nullable();
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
        Schema::dropIfExists('webmaster_socials');
    }
}
