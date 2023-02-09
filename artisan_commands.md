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

$ sail artisan make:listener StoreLoginHistory // create listener in App/Listeners

$ sail artisan event:generate // it will scan the EventServiceProvider class and generate the missing events (App/Events) and listeners (App/Listeners)

$ sail artisan make:mail SendEmailTest // will create new mail class in the app/mail dir, where we will load the blade view as an email body

$ sail artisan queue:table // generate the queue tables migration files by running the follownig command
$ sail artisan migrate // run the migration to create table in the db.

$ sail artisan queue:listen // following command will put all the jobs/queues in listening mode to consume the message/data and process via PHP CLI as a linux process (can be multiple process for multiple jobs).
// * https://medium.com/@mguariero/laravel-queue-job-with-supervisor-easily-9ece7c45365
// https://medium.com/@kouipheng.lee/laravel-eloquent-lazy-vs-eager-loaded-803852c59e1c
// https://www.section.io/engineering-education/implementing-laravel-queues/
// https://medium.com/@mguariero/laravel-queue-job-with-supervisor-easily-9ece7c45365
// https://www.itsolutionstuff.com/post/laravel-8-queue-step-by-step-tutorial-exampleexample.html


$ sail artisan config:clear // to clear config cache before starting the application
```