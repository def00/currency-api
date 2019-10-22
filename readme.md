## Installation steps:
 - copy file `env.example` to `.env`
 - run `docker-compose up` in your project directory
 - exec `composer install` in your docker app container
 - exec `php artisan migrate` in your app container
 - exec `php artisan db:seed` in your app container
 
## Updating exchange rates
 - exec `php artisan currency:fetch` in your app container
 
## Running tests
 - exec `php ./vendor/bin/phpunit` in your app container
