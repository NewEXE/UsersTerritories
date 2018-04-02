# UsersTerritories
Тестовое задание для ArtJoker #2
(первое - https://github.com/NewEXE/UsersTerritories )

## Задание
https://github.com/adminko/testphp

## Установка
1. `git clone https://github.com/NewEXE/UsersTerritories.git`
2. Настроить .env file:
	- `cp .env.example .env`
	- `php artisan key:generate`
3. `composer update --lock`
4. `php artisan migrate`
5. Импортировать MySQL дамп `protest14.sql`

## Кратий отчёт
**Технологии:** Laravel 5.6, jQuery, Chosen, Ajax, Bootstrap.
**ПО**: Vagrant 2.0.2, Homestead 5.2.0, Linux Mint 18.3.
- Создана миграция, идентичная таблице из дампа protest14.sql;
- Регистрация пользователей реализована на основе стандартной регистрации Laravel (отключен пароль и возможность войти на сайт, разрешен ввод существующего email). При вводе существующего почтового ящика происходит перенаправление на страницу пользователя;
- Поля для выбора территориальных единиц отображаются динамически и обрабатываются плагином Chosen. Данные для полей подгружаются с помощью Ajax;
- Сайт локализован на украинский язык с помощью стандартного механизма локализации;
- Помимо функций, требуемых в задании, есть возможность просмотреть весь список пользователей. Записи выводятся постранично.

Заготовки запросов (Scopes), пагинация, жадная загрузка, локализация.