<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\User', 5)->create()->each(function($u) {
            $u->meetings()->save(factory('App\Meeting')->make());
        });
    }
}
