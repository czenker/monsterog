Warning
=======

This is a prototype and not thought to be used in production yet.

System preparation
============

Install requirements for wkhtmltoimage

sudo apt-get install xvfb
wget https://wkhtmltopdf.googlecode.com/files/wkhtmltoimage-0.11.0_rc1-static-amd64.tar.bz2
tar xvjf wkhtmltoimage-0.11.0_rc1-static-amd64.tar.bz2
sudo cp wkhtmltoimage-amd64 /usr/local/bin/wkhtmltoimage

Install requirements for CutyCapt

sudo apt-get install subversion libqt4-webkit libqt4-dev g++ xvfb
svn co svn://svn.code.sf.net/p/cutycapt/code/ cutycapt
cd cutycapt/CutyCapt
qmake
make
sudo cp CutyCapt /usr/local/bin/CutyCapt


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
* Make sure your Host has the domain set in etc/hosts
* *Call* http://www.dev.local/app_dev.php


