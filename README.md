## Features
- Manage articles and categories
- Article tags management
- Search by title category
- User management.
- WYSIWYG Editor

## Requirements
- Requires a minimum PHP version of 8.0

### Installation

1. Clone project

Requires Composer.

2. Install the dependencies using composer

```sh
$ cd your-project-directory
$ composer install
```

3. Open .env.example and save it as ".env"

4. Generate application key using:

```sh
$ php artisan key:generate
```

5. Create a mysql database and enter database credentials in your .env file

```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=
```

6. Run the migration:

```sh
$ php artisan migrate
```

7. Fill DB fake data:

```sh
$ php artisan db:seed 
```

8. Start the development server:

```sh
$ php artisan serve
```

9. Install Node.js and after that install necessary packages for frontend

```
$ npm install
```
```
$ npx mix
```

If you want to management blog post you should log in in the admin panel. You can click **Login** button on the main page in the nav menu and log in with this credentials

### Credentials for admin panel:
- email: admin@example.com / admin
- password: password
