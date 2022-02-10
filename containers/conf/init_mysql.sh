#!/bin/bash
mysql_install_db --user=mysql --ldata=/var/lib/mysql/
/usr/bin/mysqld --user=root --character-set-server=utf8 --collation-server=utf8_unicode_ci &
while ! mysqladmin ping -h"localhost" --silent; do sleep 1;done
mysql < /tmp/mysql_init.sql