# 🛍️ Shop API

REST API для интернет-магазина, написанный на **Laravel 12**, с базой данных **PostgreSQL** и контейнеризацией через **Docker**.

---

## 🧰 Требования

- [Docker](https://www.docker.com/) >= 20.x  
- [Docker Compose](https://docs.docker.com/compose/) >= 2.x  
- Git  

---

## 🚀 Запуск проекта

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

`DB_HOST` (обычно = postgres)

`DB_PORT=5432`

`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`
