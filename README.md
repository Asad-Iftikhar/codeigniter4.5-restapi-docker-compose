# CodeIgniter 4.5.1, Rest API, Docker Compose
Initial configuration for a project using Code Igniter 4.5, MySQL, Nginx and Docker

## What the repository has

* Code Igniter 4 - v4.5.1
* Docker-compose start file
* PHP 8.3-fpm/Latest
* Nginx
* PhpMyAdmin
* MySQL

## Getting start

First make the clone of this repository
```html
$ git clone https://github.com/Asad-Iftikhar/codeigniter4.5-restapi-docker-compose.git
```

With the repository ready, open the file `.env` located at the root and configure it according to your database host.


Go to `codeigniter4.5-restapi-docker-compose/web/app/app/Config` and open the file `Database.php`. Change the database fields for them used in the `.env` file.
OR
Update the .env file inside web directory according to the root .env like database credentials

After configuring the files, go to the root of the project and execute  


### Add Sites Entry [https://YOUR_LOCAL_SITE_NAME]

To make your own local domain/host rename the codeigniter.conf name into folder below path

```html
$ cd codeigniter4.5-restapi-docker-compose/docker/nginx/
```
give it your own local domain name as currently it will open at https://codeigniter
You also need to add this entry into your host file

```html
$ sudo nano /etc/hosts
```

`127.0.0.1 YOUR_LOCAL_SITE_NAME`

done, the application is ready for use.


## Accessing

To access your project, type in your browser  
```html
http://YOUR_LOCAL_SITE_NAME
```

To access the phpmyadmin, type in your browser  
```html
http://localhost:9191
```

### Container shell

To access a container shell, type in your terminal

```html
$ sudo docker exec -ti <container_id> /bin/sh/
```

```html
$ docker exec -it app-codeigniter4 sh
```


### Code Igniter 4 docs

For details on how to use Code Igniter 4, visit the [documentation](https://codeigniter4.github.io/userguide/index.html).
