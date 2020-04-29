<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldwebmasteridToWebmasterSections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webmaster_sections', function (Blueprint $table) {
            $table->integer('webmaster_id')->after('id')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('webmaster_sections', function (Blueprint $table) {
            $table->dropColumn('webmaster_id');
        });
    }
}
