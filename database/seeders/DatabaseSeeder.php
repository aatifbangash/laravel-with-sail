<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        /**
         * We can call factory right in this file to create fake records.
         */
        // Post::factory(5)->create();
        
        /**
         * We can register one or more Seeders in the class to create fake records.
         * $ sail artisan db:seed // following cmd is used to run all the seeders register here.
         */
        // $this->call([PostSeeder::class, UserSeeder::class]);

        $this->call([UserSeeder::class]);
    }
}
