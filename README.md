## Laravel Todo-App

To-Do app powered with Laravel framework

___

### Project setup

1. Clone this repo
2. Config project on web server (like apache) or run in console `php artisan serve`
3. Run `composer install`
4. Create database. (Name as you like)
5. Change .env file
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=YOUR_DB_USER
DB_PASSWORD=YOUR_DB_USER_PASSWORD
```
5. Run in console `php artisan migrate --seed`

And you should be Ready to Go! 🎉🎉🎉

___

### Docker set up

1. Clone this repo
2. Change directory `cd laravel-todo-app`
3. Run `docker-compose up` can add `-d` to run in detached mode
4. Run `docker-compose exec app php -r "file_exists('.env') || copy('.env.example', '.env');"`
5. Fill in `.env` field `DB_PASSWORD`
6. Run `docker-compose exec app composer install`
7. Run `docker-compose exec app php artisan key:generate`
8. Run in console `docker-compose exec app php artisan migrate --seed`
9. Visit `http://localhost/` and you should be Ready to Go! 🎉🎉🎉
