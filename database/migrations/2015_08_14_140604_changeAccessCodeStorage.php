<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAccessCodeStorage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meeting', function($table) {
            $table->string('moderatorAccessCode', 5)->change();
            $table->string('attendeeAccessCode', 5)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meeting', function($table) {
            $table->integer('moderatorAccessCode')->default()->nullable()->unsigned()->change();
            $table->integer('attendeeAccessCode')->default()->nullable()->unsigned()->change();
        });
    }
}
