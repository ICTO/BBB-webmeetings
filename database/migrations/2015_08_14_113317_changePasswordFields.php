<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangePasswordFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('meeting', function($table) {
            $table->renameColumn('moderatorPassword', 'moderatorAccessCode');
            $table->renameColumn('attendeePassword', 'attendeeAccessCode');
        });

        Schema::table('meeting', function($table) {
            $table->integer('moderatorAccessCode')->default()->nullable()->unsigned()->change();
            $table->integer('attendeeAccessCode')->default()->nullable()->unsigned()->change();
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
            $table->renameColumn('moderatorAccessCode', 'moderatorPassword');
            $table->renameColumn('attendeeAccessCode', 'attendeePassword');
        });

        Schema::table('meeting', function($table) {
            $table->string('moderatorPassword')->change();
            $table->string('attendeePassword')->change();
        });
    }
}
