**Окружение docker & Laravel**  *by* David Oganezoff
*[ QP ]* **Quest Project *app***

---

> Инструкция по первому запуску:

1. Собираем:  `$ docker-compose build`
2. Запускаем: `$ docker-compose up -d`
3. При необходимости поменять на свою композицию: `- ./app:/var/www/html`
4. На ваш путь с источниками, например: `- ../my-sources-in-parent-folder:/var/www/html`
5. В bash, чтобы обновить композер `composer update`
6. В bash, чтобы бы дать разрешения: `$ chown -R www-data:www-data *`
7. Если запрещено редактировать: `$ sudo chmod -R 777 QP/*`
8. При проблемах с ключом laravel: `$ php artisan key:generate`
9. Мигрировать базу данных: `$ php artisan migrate`
------------------
Вконтакте: vk.com/xp0nat
