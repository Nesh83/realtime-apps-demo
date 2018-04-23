## Realtime-apps-demo

This is example app created for Quantox meetup presentation

## Requirements

* PHP >= 7.1
* Node
* Nmp
* Redis
* Composer
* Mysql

# Installation

    git clone https://github.com/Nesh83/realtime-apps-demo.git

    cd realtime-apps-demo
    
    composer install
    
    cp .env.example .env
    
    php artisan key:generate
    
 Fill app data, mysql and redis credentials in .env file
 
    npm install
 
    npm install -g laravel-echo-server
 
    cp laravel-echo-server.json.example laravel-echo-server.json
    
 Fill authHost and redis credentials in laravel-echo-server.json file
 
 To start laravel echo server
 
    laravel-echo-server start
    
 And last thing, start laravel queue (in new terminal so we dont stop echo server)
 
    php artisan queue:work
    

