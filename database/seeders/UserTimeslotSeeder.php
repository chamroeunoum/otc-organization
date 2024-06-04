<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class UserTimeslotSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Fetch all the users to assign them a profile picture from generated ai
         */
        echo 'START ASSIGNING TIMESLOT TO USERS' . PHP_EOL;
        \App\Models\User::all()->map(function($user){
            echo 'START ASSIGNING TIMESLOT TO USERS : ' . $user->id . PHP_EOL;
            $user->timeslots()->sync([1,2]);
        });
        echo 'END GENERATING USER PROFILE PHOTO' . PHP_EOL;
    }
}
