<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldiconnameToWebmasterSocials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webmaster_socials', function (Blueprint $table) {
            $table->string('icon_name',30)->after('social_codename')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('webmaster_socials', function (Blueprint $table) {
            $table->dropColumn('icon_name');
        });
    }
}
