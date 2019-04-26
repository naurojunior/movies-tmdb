# Movie TMDB

### Assumptions and Tech
- After some tests, it was clear that the API was slow enough to make direct calls from PHP unfeasible, so, a cache strategy was needed.
- REDIS was the first option for caching and simplicity, but wasn't a good solution after all, considering that the TMDB data was relational
- MySQL was choosen for caching movies and genres. A Command was created with Laravel to sync movies (and genres). The code below shows how to create a schedule task to run it each 30 minutes 
```php artisan sync:movies```

### Installation

### PHP ###

MySQL is required. Create a database.
Create and .env file as in .env.example with database name, username and password 
The TMDB API will be called each 30 minutes to fetch data

```sh
$ cd api
$ composer install
$ php artisan migrate
$ php artisan schedule:run
```

### ReactJS ###

Create and .env file as in .env.example

```sh
$ cd app
$ npm install
$ npm install -g serve
$ serve -s build
```

### Third-party libraries - PHP

| Libs | Reason |
| ------ | ------ |
| barryvdh/laravel-cors | Used to avoid CORS problems when beign request in different domain |

### Third-party libraries - ReactJS

| Libs | Reason |
| ------ | ------ |
| axios | Simplier way to make api requests |
| dotenv | Manage environment  variables (.env) |
| react-router-dom | Manage routes |
| redux-thunk | Middleware to extend "store" abilities and let write async logic |

License
----

MIT
