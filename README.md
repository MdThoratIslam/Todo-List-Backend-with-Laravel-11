# Todo List Backend with Laravel

This project provides a backend API for a Todo List application built using the Laravel framework.

# create a new repository on the command line

### echo "# Todo-List-Backend-with-Laravel-11" >> README.md
```bash
git init
git add README.md
git commit -m "first commit"
git branch -M main
git remote add origin https://github.com/MdThoratIslam/Todo-List-Backend-with-Laravel-11.git
git push -u origin main

…or push an existing repository from the command line

git remote add origin https://github.com/MdThoratIslam/Todo-List-Backend-with-Laravel-11.git
git branch -M main
git push -u origin main
```
## Prerequisites

Before starting, ensure you have the following installed:

- PHP (>= 8.0)
- Composer
- MySQL or any other supported database
- Laravel CLI

## Installation

### 1. Create a New Laravel Project

```bash
composer create-project laravel/laravel example-app
cd example-app
```
### 2. Env file database Configration
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_backend_api_task
DB_USERNAME=root
DB_PASSWORD=

php artisan migrate 
php artisan serve --host=192.168.1.77 --port=8080
```

### 3. Make Model and also related all file create
```bash
php artisan make:model Task/Task --all
```

### 4. Route Folder make api file create

Laravel version 11 api.php amke a command use and also install auth:sanctum

```bash
php artisan install:api
```

### 5. Registration Controller Make
```bash
php artisan make:request Auth/RegistrationRequest
php artisan make:resource UserResource
php artisan make:controller Auth/RegisterController -i
```
### 6. Login Controller Make
Make Login Controller and also make login request validation file 
```bash
php artisan make:request Auth/LoginRequest
php artisan make:controller Auth/LoginController -i
```