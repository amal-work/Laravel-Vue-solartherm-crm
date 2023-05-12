# Silvercrest CRM
### Installation
Installing composer packages: 
```sh
$ composer install
```

Installing bower packages: 
```sh
$ cd public
$ bower install
```

Generating an application key:
```sh
$ php artisan key:generate
```
Migrating and seeding the database:
```sh
$ php artisan migrate
$ php artisan db:seed
```