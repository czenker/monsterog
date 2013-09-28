Warning
=======

This is a prototype and not thought to be used in production yet.

Installation
============

Quick start to install in AOE default Vagrant Box:

* *Clone this repository*
* *Install composer*: `curl -s https://getcomposer.org/installer | php`
* *Install dependencies*: `php composer.phar install`
* *Fix folder rights*: `sudo apt-get install acl`
    sudo setfacl -R -m u:www-data:rwX -m u:vagrant:rwX app/cache app/logs
	sudo setfacl -dR -m u:www-data:rwX -m u:vagrant:rwX app/cache app/logs
* *Fix apache root path*: set to `/var/www/dev/local/htdocs/web`
* *Install ext-mongo*
    sudo apt-get install mongodb
    sudo pecl install mongo
* Make sure your Host has the domain set in etc/hosts
* *Call* http://www.dev.local/app_dev.php
