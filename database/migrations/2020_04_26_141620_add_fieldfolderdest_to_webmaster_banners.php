<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldfolderdestToWebmasterBanners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webmaster_banners', function (Blueprint $table) {
            $table->string('destination_folder',30)->after('banner_type')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('webmaster_banners', function (Blueprint $table) {
            $table->dropColumn('destination_folder');
        });
    }
}
