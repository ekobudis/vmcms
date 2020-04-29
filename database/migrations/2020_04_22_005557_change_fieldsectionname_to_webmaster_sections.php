<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldsectionnameToWebmasterSections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webmaster_sections', function (Blueprint $table) {         
            $table->dropColumn('section_name');
            $table->integer('menu_item_id')->after('id');
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
            $table->dropColumn('menu_item_id');
            $table->string('section_name',30)->after('id');
        });
    }
}
