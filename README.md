This Project was built as a simple backend using laravel and Sanctum

## Installation 

    Install the dependencies and start the server to test the Api.

    $ Composer install
    $ php artisan key:generate
    $ composer require laravel/sanctum
    $ php artisan migrate    
    $ php artisan db:seed

## Endpoints

    POST 'api/login';  
    POST 'api/register'   
    GET 'api/users'  
    GET 'api/users/show/{user:id})
    GET 'api/users/search/{name}'
    PUT 'api/users/update/{user:id}'
    DELETE 'api/users/destory/{user:id}'
    DELETE 'api/logout'
   
