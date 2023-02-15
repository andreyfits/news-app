# news-app
News application on the Laravel

## Requirements
- Requires a minimum PHP version of 8.0


### Installation

Requires Composer.


1. Install the dependencies using composer

```sh
$ cd your-project-directory
$ composer install
```

2. Open .env.example and save it as ".env"

3. Generate application key using:

```sh
$ php artisan key:generate
```

4. Create a mysql database and enter database credentials in your .env file

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=
```

5. Run the migration:

```sh
$ php artisan migrate
```

6. Fill DB fake data:

```sh
$ php artisan db:seed --class=CategorySeeder
```
```sh
$ php artisan db:seed --class=PostSeeder
```
```sh
$ php artisan db:seed --class=TagSeeder
```

6. Finally start the development server:

```sh
$ php artisan serve
```

7. Page for the management blog post:
 - /admin
