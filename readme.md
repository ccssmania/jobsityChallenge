
## About Poject

This project was a challenge from jobsity in which the main was create (post/blog) application using user entries.
there are two main public pages, the first one list the three las entries of each user ordered by date and the second one is like a profile page where you can see all the user entries and his tweets. 

This app was built up using Laravel framework.
Laravel is accessible, powerful, and provides tools required for large, robust applications.

The project implements unit test and use a continuous integration with travis and heroku when you push to your git

## Demo

The project is already in a free hosting Heroku and it use a continuous integration with travis and Heroku
https://jobsitychallenge.herokuapp.com/

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Installation

The following steps are made to work in ubuntu

## Step 1: Install Apache
```
	sudo apt -get update
	sudo apt -get install apache2 
```
## Step 2: Install PHP 7
```
	sudo apt-get install software-properties-common
	sudo add-apt-repository ppa:ondrej/php
	sudo apt-get update
	sudo apt-get install -y php7.3
```

Note that you must set php in your env variables

## Step 3: Install Mysql
```
	sudo apt update
	sudo apt install mysql-server
	sudo mysql_secure_installation
```

## Step 4: Install Composer
Note: to install composer you must have PHP in your env variables

run
```
php -v
```
output
```
PHP 7.3.2 (cli) (built: Feb 21 2019 15:30:47) ( NTS )
Copyright (c) 1997-2018 The PHP Group
Zend Engine v3.3.2, Copyright (c) 1998-2018 Zend Technologies
```
Installing composer
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
## Step 5: Download the app
download  the repo using
```
	git clone https://github.com/ccssmania/jobsityChallenge.git
```
Note that you need to have git installed

then
```
	cd jobsityChallenge
	cp .env.example .env
	composer install --no-interaction --prefer-dist --optimize-autoloader
```
if you are in a local environment

modify the .env file to work with your apache and sql and set the database
```
	APP_URL=http://localhost

	LOG_CHANNEL=stack

	DB_CONNECTION=mysql
	DB_HOST=127.0.0.1
	DB_PORT=3306
	DB_DATABASE=jobsity_challenge
	DB_USERNAME=root
	DB_PASSWORD=
```

Migrate the database

```
	php artisan migrate
```
Seed the database
```
	php artisan db:seed
```
Run the unit test
```
	./vendor/bin/phpunit

```

if you are running local 
```
	php artisan serve
```
and go to localhost:8000

## Step 6: Virtual Host this is only for jobsity Challenge

```
```

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
