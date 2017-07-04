#!/usr/bin/env bash

###phpunit (dev only)

wget https://phar.phpunit.de/phpunit.phar && chmod +x phpunit.phar && mv phpunit.phar /usr/local/bin/phpunit


echo "clear and prepare cache and logs"
chmod -R a+rw /var/cache/api/
chmod -R a+rw /var/log/api/


apache2-foreground
