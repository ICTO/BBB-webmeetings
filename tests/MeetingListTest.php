<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Meeting;

class MeetingListTest extends TestCase
{
    use WithoutMiddleware;
    use DatabaseTransactions;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        // Create a new user in the database
        $user = factory(User::class)->create();

        // Create 5 new meetings for this user
        for($i = 1; $i <= 5; $i++) {
            $user->meetings()->save(factory(Meeting::class)->make());
        }

        $this->assertEquals(5, $user->meetings()->count());
        $this->assertEquals(5, DB::table('meeting')->count());
    }
}
