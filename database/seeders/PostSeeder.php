<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

/**
 * $ sail artisan make:seeder PostSeeder // will create seederClass in database/seeder dir
 */
class PostSeeder extends Seeder
{
    /**
     * $ sail artisan make:seeder PostSeeder // following command is used to create a seederClass
     * $ sail artisan db:seed --class=PostSeeder // will use to run a specific seeder only
     */
    public function run()
    {
        
        /**
         * After running a seeder command. Following snippet is used to create a records via loop in a table
         */
        // for ($i = 1; $i < 100; $i++) {
        //     Post::create([
        //         "title" => "testing $i",
        //         "body" => "testing body $i"
        //     ]);
        // }

        /**
         * After running a seeder command. Following snippet is used to create a records via PostFactory in a table
         * Check for PostFactory in database/PostFactory.php
         */
        // Post::factory()->count(50)->create(); // run via factory 
    }
}