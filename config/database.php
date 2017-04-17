<?php

return [
    /*
    |--------------------------------------------------------------------------
    | PDO Fetch Style
    |--------------------------------------------------------------------------
    |
    | By default, database results will be returned as instances of the PHP
    | stdClass object; however, you may desire to retrieve records in an
    | array format for simplicity. Here you can tweak the fetch style.
    |
    */

    'fetch' => PDO::FETCH_OBJ,

    /*
    |--------------------------------------------------------------------------
    | Database Default Driver
    |--------------------------------------------------------------------------
    |
    | Here you can change database driver.
    |
    */
    'driver' => 'mysql',

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    |
    */
    'mysql' => [
        'host' => '127.0.0.1',
        'user' => 'root',
        'pass' => '',
        'db' => 'algebra_contacts',
        'charset' => 'utf8',
        'collation' => 'utf8_general_ci'
    ],
    'sqlite' => [
        'db' => ''
    ],
    'pgsql' => [
        'host' => '',
        'user' => '',
        'pass' => '',
        'db' => '',
        'charset' => 'utf8'
    ]
];
