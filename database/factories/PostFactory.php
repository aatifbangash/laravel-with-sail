<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * $ sail artisan make:factory PostFactory --model=Post // following cmd is used to create a factory for Post model
     * $ sail artisan db:seed --class=PostSeeder // following cmd is used to run seeder and insert records in table via factory
     * $ sail artisan db:seed // following cmd is used to run all seeders defined in the DatabaseSeeder.php file
     */
    public function definition()
    {
        /**
         * faker library is used to generate dummy or fake data for the table to insert.
         * Following factory will be used in the seeder (PostSeeder) to insert fake data into a table.
         */
        return [
            'title' => $this->faker->title(),
            'body' => $this->faker->text(),
        ];
    }
}