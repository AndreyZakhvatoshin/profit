# API создания задач и спринтов
## Установка

```sh
git clone https://github.com/AndreyZakhvatoshin/profit.git
sudo chown -R $USER:$USER profit
cd profit
```

## Настройка

```sh
composer install
php artisan key:generate
php artisan migrate
```

## Docker
Управление docker - контейнерами осуществляется с помощью Makefile

## Makefile

| Команда           | Процессы                                                     |
| ----------------- | ------------------------------------------------------------ |
| make docker-up    | docker-compose up -d                                         |
| make docker-down  | docker-compose down                                          |
| make docker-build | docker-compose up --build -d                                 |
| make test         | docker exec ads_php-fpm_1 vendor/bin/phpunit --colors=always |


## Запросы к api
| Метод | url                       | аргументы |
| ----- | ------------------------- | --------- |
| PATCH | api/estimate/{task}       |           |
| POST  | api/sprint                |           |
| POST  | api/sprint/task/add       |           |
| POST  | api/sprint/{sprint}/close |           |
| POST  | api/sprint/{sprint}/start |           |
| POST  | api/tasks                 |           |
| POST  | api/tasks/{task}/close    |           |
