# Docker based LAMP by David Oganezoff for QP app
# QP ( ' QuestProject app ' )

LAMP is abbreviate of Linux Apache MySQL/MariaDB PHP.

That mean complete environment for development on PHP language.

## How to use

Just copy docker-compose.yml from dist example

    cp docker-compose.dist.yml docker-compose.yml

Then build

    docker-compose build

And run composition

    docker-compose up -d

Of course you wan to pass your PHP files to this composition, for this you
need overwrite strings like:

    - ./app:/var/www/html

To your path with sources, eg `- ../my-sources-in-parent-folder:/var/www/html`.

If you don't like `/var/www/html` path, you may create your own config of
apache and bind it into `php` or if you use fpm based container, then write
config for NGINX and bind it `nginx` container.


## On start
write $ chown -R www-data:www-data * * | in /var/www/html#
write if need (for editing) $ sudo chmod -R 777 QP | in QP

## in QP
if need $ php artisan key:generate | in /var/www/html#
next write $ php artisan migrate | in /var/www/html#

