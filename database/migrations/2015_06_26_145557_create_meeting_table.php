<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meeting', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meetingId')->unique();
            $table->integer('user_id')->unsigned();
            $table->string('moderatorPassword')->default('moderator');
            $table->string('attendeePassword')->default('attendee');
            $table->string('title');
            $table->string('description');
            $table->string('welcomeText')->default("Welcome to this webmeeting.");
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('meeting');
    }
}
