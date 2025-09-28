# Shop API

REST API для интернет-магазина, написанный на **Laravel 12**, с базой данных **PostgreSQL** и контейнеризацией через **Docker**.

---

## Требования

- [Docker](https://www.docker.com/) >= 20.x  
- [Docker Compose](https://docs.docker.com/compose/) >= 2.x  
- Git  

---

## Запуск проекта

1. Клонировать репозиторий:
   ```bash
   git clone https://github.com/enfantsrichesdeprimess/shop_api.git
   cd shop_api
   
2.Скопировать файл окружения:
   ```bash
cp .env.example .env
```
3.Настроить `.env`:

`APP_NAME`, `APP_ENV`, `APP_URL`

`DB_HOST`

`DB_PORT=5432`

`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`

4. Собрать и запустить контейнеры
   ```bash
   docker compose up -d --build
    ```
5.Установить зависимости
```bash
docker compose exec app composer install
```
6.Сгенерировать ключ приложения
```bash
docker compose exec app php artisan key:generate
```
7.Выполнить миграции и сиды
```bash
docker compose exec app php artisan migrate --seed
```



