<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldbannerdetailToBanners extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->string('title_class',40)->after('banner_title')->nullable();
            $table->float('data_delay',10,3)->after('title_class')->default(0);
            $table->string('data_class',120)->after('data_delay')->nullable();
            $table->text('page_content')->after('banner_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('banners', function (Blueprint $table) {
            $table->dropColumn('title_class');
            $table->dropColumn('data_delay');
            $table->dropColumn('data_class');
            $table->dropColumn('page_content');
        });
    }
}
