# Serapion Movie app

### Starting the development environment


Clone the repository with:

```sh
$ git clone git@github.com:franraknic/serapion.git
```

navigate to the cloned repository and start the docker container with:
```sh
$ docker-compose up -d
```
ports 80, 3306, 8000, 8080 should be free so shut down any services running on them

for the sake of ease of setting up this presenation, configuration files and artifacts are contained in the repository
in normal circumstances the configuration files would be in the .gitignore files and generated using the commited .env.example files

### Setup the application

navigate to the www/app directory and install the javascript dependencies with:

```sh
$ npm install 
```

navigate to the backend directory www/api and install the php dependencies with [composer](https://getcomposer.org/doc/00-intro.md):

```sh
$ composer install --ignore-platform-reqs 
```

#### Create the database

to create the database you can visit the [phpMyAdmin](http://localhost:8000/) login with u:root p:root and use the web interface to create a database named "movies" or any name that you changed in the www/api/.env DB_DATABASE variable

enter the running docker container using the command:

```sh
$ docker exec -ti container_name bash
```

the ``` container_name``` can be obtained using the command 
```sh
$ docker ps 
```

where the output will be something like:
```
CONTAINER ID        IMAGE                   COMMAND                  CREATED             STATUS              PORTS                    NAMES
de45a722c79e        phpmyadmin/phpmyadmin   "/docker-entrypoint.…"   5 hours ago         Up 5 hours          0.0.0.0:8000->80/tcp     serapion_phpmyadmin_1
f839448a756c        serapion_www            "docker-php-entrypoi…"   5 hours ago         Up 5 hours          0.0.0.0:80->80/tcp       serapion_www_1
6fd77fcc44b1        mariadb                 "docker-entrypoint.s…"   5 hours ago         Up 5 hours          0.0.0.0:3306->3306/tcp   serapion_db_1
```

##### Create the databse schema and populate with some data
so use the container name listed under the 80:80 port, in my case serapion_www_1.
Once the command is executed you should have a shell in the docker container.
Navigate to the api/ directory and setup the database schema and (optionally) populate the movies table with some random names:

```sh
$ php artisan migrate
$ php artisan db:seed
```
once the migrations are executed exit the shell with ctrl+d

##### Start the local npm server

To start using the application navigate to the app/ directory and execute the following command:
```sh
$ npm run serve 
```

The application should be available on [localhost:8080](http://localhost:8080/#/)

### API Documentation

The documenation is generated using [laravel-apidoc-generator](https://github.com/mpociot/laravel-apidoc-generator)
Once you have the environment runing you can check it out on [localhost server](http://localhost/api/public/docs/#info)

# Help

for additional information and help you can contact me on:
fran.raknic@gmail.com