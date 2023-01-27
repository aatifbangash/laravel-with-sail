### Laravel Sail
Sail is an CLI in the root of the project, it allow to intract with the laravel project running in the docker using docker-compose. Sail provides following docker-composer services to work with in the development enviroment. PHP, Mysql, Redis and many more.

### Sail installation
It auto install with the laravel new application, Just install the new laravel application and start using sail cli.
 
* Make sure docker and docker-compose are installed.
* Make sure local machine is having a PHP (CLI) installed.
* > sudo apt install php-cli unzip
* Below extension are required to install on the host for the composer to run
* > sudo apt-get install php-gd
* > sudo apt-get install php-intl
* > sudo apt-get install php-xsl
* > sudo apt-get install php-curl

* Make sure local machine is having the composer
* > curl -sS https://getcomposer.org/installer -o /tmp/composer-setup.php
* > HASH=`curl -sS https://composer.github.io/installer.sig`
* > php -r "if (hash_file('SHA384', '/tmp/composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
* > sudo php /tmp/composer-setup.php --install-dir=/usr/local/bin --filename=composer
* > composer

#### Install sail in existing project
> composer require laravel/sail --dev

> php artisan sail:install **//will publish the docker-composer.yml file to root of application**

> ./vendor/bin/sail up **//up application with sail**
##### Install laravel project via composer
> composer create-project laravel/laravel example-app

> cd example-app

> composer update

> php artisan serve

**Note** above is used to install laravel application via composer

##### OR Install via CURL
> curl -s https:**laravel.build/example-app | bash

##### Install with multiple docker services
> curl -s "https://laravel.build/example-app?with=mysql,pgsql,mariadb,redis,memcached,meilisearch,minio,selenium,mailhog" | bash

**Note** Above is used to install laravel application along with sail via CURL

> cd example-app

> ./vendor/bin/sail up
> http://localhost //in the browser to access your application

> http://laravel.test //in the browser to access application

**Note** to start the laravel sail 

##### add alis to ~/.bashrc to avoid using ./vendor/bin with sail command
> alias sail='[ -f sail ] && sh sail || sh vendor/bin/sail'

> sail up 

> sail up -d // to up sail in detached mode

> sail stop // to stop sail services

> sail artisan queue:work // proxy command with in the laravle sail (container) 
> sail php script.php // execute script.php with in the sail
> sail composer require laravel/sanctum //install package in sail

### Installing Composer Dependencies For Existing Applications running in the sail
```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```
    
#### SSH into sail container
> sail shell

> sail root-shell

#### rebuild sail docker image after making changes to docker-composer file
> sail build --no-cache
> sail up

#### share your site
> sail share

#### following command will create the sail dockerFile in the project directory, we are free to make changes to that.
> sail artisan sail:publish

> sail build --no-cache //build image after changes