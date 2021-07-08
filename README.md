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
