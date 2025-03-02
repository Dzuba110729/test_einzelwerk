Проект: Управление контрагентами 
(Laravel 11 + Inertia.js + Vue)

Описание проекта
Этот проект представляет собой систему управления контрагентами, включающую:

- Регистрацию и авторизацию пользователей через Laravel Sanctum
- Добавление контрагентов по ИНН с получением данных из API DaData
- API на Laravel 11 и PostgreSQL
- Фронтенд на Vue 3 + Inertia.js + ShadCN
- Документация API через Swagger
- Тестирование через PHPUnit

Требования для запуска

Системные требования:
- PHP 8.2+
- Composer 2.0+
- Node.js 18+ (рекомендуется LTS)
- PostgreSQL 14+

Переменные окружения:
Создай файл .env, скопировав из .env.example, и настрой его

Обязательно укажи настройки базы данных и API DaData:

Установка и запуск проекта
1. Клонирование репозитория
git clone https://github.com/Dzuba110729/test_einzelwerk.git
2. Установка зависимостей
- Backend (Laravel)(composer install, 
  php artisan key:generate)

- Frontend (Vue + Inertia.js)(npm install)

3. Настройка базы данных
php artisan migrate
4. Запуск проекта
- Запуск backend (php artisan serve)

- Запуск frontend (npm run dev)

Основные API маршруты:
1. Аутентификация:
- POST	/api/register
- POST	/api/login

2. Контрагенты:
- POST	/api/counterparties
- GET	/api/counterparties


Запуск тестов:
- php artisan test

Генерация Swagger:
- php artisan l5-swagger:generate
Документация будет доступна по адресу:

http://127.0.0.1:8000/api/documentation
