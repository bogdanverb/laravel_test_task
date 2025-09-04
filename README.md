# Laravel Movies Test Task

## Опис

Тестове завдання на Laravel.

## Встановлення

1. Клонуйте репозиторій:
	```
	git clone <repo-url>
	cd laravelTestTask
	```
2. Встановіть залежності:
	```
	composer install
	```
3. Створіть файл `.env` (можна скопіювати з `.env.example`) і налаштуйте базу даних (SQLite за замовчуванням):
	```
	cp .env.example .env
	touch database/database.sqlite
	```
4. Згенеруйте ключ додатку:
	```
	php artisan key:generate
	```
5. Виконайте міграції та сидери:
	```
	php artisan migrate --seed
	```
6. Запустіть локальний сервер:
	```
	php artisan serve
	```

## Коротко про функціонал
- CRUD для фільмів та жанрів
- REST API
- Завантаження та відображення постерів
- Bootstrap-інтерфейс
- Сидери для тестових даних

## Додатково
- За замовчуванням для фільмів використовується постер `/images/default-poster.jpg`, якщо не вказано інший.

---

=======
# laravel_test_task
