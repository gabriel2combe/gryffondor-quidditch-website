# "Griffindor Quidditch dot com" *by* **Code Quantum**

## Description

This repository is a simple PHP MVC structure from scratch.

It uses some cool vendors/libraries such as FastRouter (fast request php router), Twig and PHP_CodeSniffer soon.
For this one, just a simple example where users can chose one of their databases and see tables in it.

## Steps

1. Clone the repos from Github.
2. Run `composer install` in order to install all PHP dependencies.
3. Create *app/db.php* from *app/db.php.dist* file and add your DB parameters.
```php
define('APP_DB_HOST', 'your_db_host');
define('APP_DB_NAME', 'quidditch');
define('APP_DB_USER', 'your_db_user_wich_is_not_root');
define('APP_DB_PWD', 'your_db_password');
```
4. Import `db.sql` in your SQL server,
5. Go to *public* directory (`cd public`) and run internal PHP webserver with `php -S localhost:8000` inside.
6. Test on your localhost default URL : `localhost:8000`.
7. Administration side of the web app is available at the URL : `localhost:8000/admin`. (login: admin, password: admin)




