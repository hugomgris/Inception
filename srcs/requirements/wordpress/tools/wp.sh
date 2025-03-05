#!/bin/bash

#1 create needed dirs
mkdir /var/www/
mkdir /var/www/html
cd /var/www/html
rm -rf *

#2 download the Wordpress Command Line Interface
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar 

chmod +x wp-cli.phar 

mv wp-cli.phar /usr/local/bin/wp

#3 download Wordpress core files, rename config file, retrieves premade wp-config.php file
wp core download --allow-root

mv /var/www/html/wp-config-sample.php /var/www/html/wp-config.php

mv /wp-config.php /var/www/html/wp-config.php

#4 configure Wordpress database (replace placeholders)
sed -i -r "s/db1/$db_name/1"   wp-config.php
sed -i -r "s/user/$db_user/1"  wp-config.php
sed -i -r "s/pwd/$db_pwd/1"    wp-config.php

#5 install and configure Wordpress with vars from .env file
wp core install --url=$DOMAIN_NAME/ --title=$WP_TITLE --admin_user=$WP_ADMIN_USR --admin_password=$WP_ADMIN_PWD --admin_email=$WP_ADMIN_EMAIL --skip-email --allow-root

#6 create Wordpress base user (author)
wp user create $WP_USR $WP_EMAIL --role=author --user_pass=$WP_PWD --allow-root

#7 install and configure Wordpress themes and plugins
wp theme install neve --activate --allow-root

wp plugin install redis-cache --activate --allow-root

wp plugin update --all --allow-root

#8 configure PHP and REDIS
sed -i 's/listen = \/run\/php\/php7.3-fpm.sock/listen = 9000/g' /etc/php/7.3/fpm/pool.d/www.conf

mkdir /run/php

wp redis enable --allow-root

#9 Start PHP_FPM
/usr/sbin/php-fpm7.3 -F
