
# TDD Laravel


## Start project

To run the project, run the following commands

* clone repository
```
git clone https://github.com/DawidPlociennikDev/laravel-tdd.git
```

* copy env
```
cp .env.example .env
```

* install dependencies
```
composer install
```

* generate aplication encryption key
```
php artisan key:generate
```

* build docker
```
docker-compose build app
```

* run docker enviroment
```
docker-compose up -d
```

* enter project [http://localhost:8000](http://localhost:8000)


* phpMyAdmin [http://localhost:8080](http://localhost:8080)

* seed database
```
docker-compose exec app php artisan migrate --seed
```

## Testing
* run test
```
docker-compose exec app php artisan test
```
