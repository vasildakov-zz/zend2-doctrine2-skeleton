<?php
return array(
    'doctrine' => array(
        'connection' => array(
            'orm_default' => array(
                'driverClass' =>'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => array(
                    'host'     => 'localhost',
                    'port'     => '3306',
                    'user'     => 'root',
                    'password' => '1',
                    'charset' => 'utf8',
                    'dbname'   => 'zf2d2',
                    'driverOptions' => array(
                        1002=>'SET NAMES utf8'
                    )
                )
            )
        ),
        /* 'driver' => array(
            'Application_driver' => array(
                'class' =>'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/Application/Entity')
            ),
        ),

        'orm_default' => array(
            'drivers' => array(
                'Application\Entity' => 'Application_driver'
            ),
        ), */
    ),
);