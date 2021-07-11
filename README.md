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
создать .env файл на основе файла .env.example
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
| Метод | url                       | аргументы                  |
| ----- | ------------------------- | -------------------------- |
| PATCH | api/estimate/{task}       | {task} - task_id, estimate |
| POST  | api/sprint                | week                       |
| POST  | api/sprint/task/add       | sprint_id, task_id         |
| POST  | api/sprint/{sprint}/close | {sprint} - sprint_id       |
| POST  | api/sprint/{sprint}/start | {sprint} - sprint_id       |
| POST  | api/tasks                 | title, description         |
| POST  | api/tasks/{task}/close    | {task} - task_id           |
