Zend2 Doctrine2 Skeleton Application
=======================


Installation
------------

Using Composer (recommended)
----------------------------
The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies using the `create-project` command:

    curl -s https://getcomposer.org/installer | php --
    php composer.phar create-project -sdev --repository-url="https://packages.zendframework.com" zendframework/skeleton-application path/to/install

Alternately, clone the repository and manually invoke `composer` using the shipped
`composer.phar`:

    cd my/project/dir
    git clone https://github.com/vasildakov/zend2-doctrine2-skeleton.git --recursive
    cd zend2-doctrine2-skeleton
    php composer.phar self-update
    php composer.phar install

    cd public/
    php -S localhost:8000

(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)



Web Server Setup
----------------

### PHP CLI Server

The simplest way to get started if you are using PHP 5.4 or above is to start the internal PHP cli-server in the root directory:

    php -S 0.0.0.0:8080 -t public/ public/index.php

This will start the cli-server on port 8080, and bind it to all network
interfaces.

**Note: ** The built-in CLI server is *for development only*.

### Apache Setup

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName zend2-doctrine2-skeleton
        DocumentRoot /path/to/zend2-doctrine2-skeleton/public
        SetEnv APPLICATION_ENV "development"
        <Directory /path/to/zend2-doctrine2-skeleton/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>

### Setup your Database connection
Add the database connection information in config/autoload/local.php.

    return array(
        // ...
        'doctrine' => array(
            'connection' => array(
                'orm_default' => array(
                    'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                    'params' => array(
                        'host'     => 'localhost',
                        'port'     => '3306',
                        'user'     => 'username',
                        'password' => 'xxxxxxxx',
                        'dbname'   => 'database',
                    )
                )
            )
        ),
    );


### Install Doctrine modules
Doctrine can be integrated into Zend Framework 2 as a “module” which provides all the libraries and configuration in a self-contained bundle.

    {
        "name": "zendframework/skeleton-application",
        "description": "Zend 2 Doctrine2 Skeleton Application",
        "license": "BSD-3-Clause",
        "keywords": [
            "framework",
            "zf2",
            "Doctrine",
            "Doctrine2"
        ],
        "homepage": "http://framework.zend.com/",
        "require": {
            "php": ">=5.3.3",
            "zendframework/zendframework": "2.3.*",
            "zendframework/zend-developer-tools": "dev-master",
            "zendframework/zendgdata": "2.*",
            "doctrine/doctrine-module": "0.*",
            "doctrine/doctrine-orm-module": "0.*",
            "hounddog/doctrine-data-fixture-module": "0.0.*",
            "gedmo/doctrine-extensions": "2.3.*",
            "doctrine/annotations": "dev-master",
            "symfony/yaml": "dev-master"
        }
    }
Then run php composer.phar update to install the modules.


### Configure Doctrine
Edit $PROJECT_DIR/config/application.config.php and add DoctrineModule and DoctrineORMModule to the list of modules–in that order, and before the Album module. Like this:

    return array(
        'modules' => array(
            'Application',
            'DoctrineModule',
            'DoctrineORMModule',
            'DoctrineDataFixtureModule',
            'ZendDeveloperTools',
        ),
    // ...,
    );



### Generate Doctrine entities
