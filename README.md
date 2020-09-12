**Окружение docker & Laravel**  *by* David Oganezoff
*[ QP ]* **Quest Project *app***

---

> Инструкция по первому запуску:

1. Собираем:  `$ docker-compose build`
2. Запускаем: `$ docker-compose up -d`
3. При необходимости поменять на свою композицию: `- ./app:/var/www/html`
4. На ваш путь с источниками, например: `- ../my-sources-in-parent-folder:/var/www/html`
5. В bash, что бы дать разрешения: `$ chown -R www-data:www-data *` -> /var/www/html
6. Если запрещено редактировать: `$ sudo chmod -R 777 QP/*` -> QP/*
7. При проблемах с ключом laravel: `$ php artisan key:generate` -> /var/www/html
8. Мигрировать базу данных: `$ php artisan migrate` -> /var/www/html
------------------
Вконтакте: vk.com/xp0nat
