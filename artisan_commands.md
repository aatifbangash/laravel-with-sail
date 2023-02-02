#### Artisan useful commands

```php

$ sail artisan make:controller PostsController // create controller, must be plural

$ sail artisan make:model Post // create model, must be single

$ sail artisan make:migration create_posts_table // create migration for new table

$ sail artisan migrate // run migration

$ sail artisan make:migration drop_products_table // add migration for dropSchema in the up() method

$ sail artisan migrate // run migration to drop table

$ sail artisan migrate:refresh // drop all tables and re-run migration

$ sail artisan make:seeder PostSeeder //create seeder in database/seeder dir

$ sail artisan db:seed --class=PostSeeder // run specific seeder only

$ sail artisan db:seed // run all seeders

$ sail artisan make:factory PostFactory --model=Post //create factory in data/factory dir

$ sail artisan db:seed --class=PostSeeder // run specific seeder only

$ sail artisan make:request CustomAuthRequest // create custom form request validation

$ sail artisan make:event LoginHistory // create event in App/Events

$ sail artisan make:listener StoreLoginHistory // create listener in App/Listeners

$ sail artisan event:generate // it will scan the EventServiceProvider class and generate the missing events (App/Events) and listeners (App/Listeners)

```