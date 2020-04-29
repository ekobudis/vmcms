<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWebmastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webmasters', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',50);
            $table->text('description')->nullable();
            $table->string('email',30)->nullable();
            $table->string('website',40)->nullable();
            $table->string('phone_no',20)->nullable();
            $table->string('mobile_no',20)->nullable();
            $table->string('address',120)->nullable();
            $table->string('city',40)->nullable();
            $table->string('state',30)->nullable();
            $table->string('country',30)->nullable();
            $table->string('postal_code',6)->nullable();
            $table->float('latitude',10,6)->default(0);
            $table->float('longitude',10,6)->default(0);
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
        Schema::dropIfExists('webmasters');
    }
}
