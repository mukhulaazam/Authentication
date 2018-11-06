<?php 

    return [
        'app' => [
            'url' => 'http://localhost',
            'hash' => [
                'algo' => PASSWORD_BCRYPT,
                'cost' => 10
            ]
            ],

            'db' => [
                'driver' => 'mysql',
                'host' => '127.0.0.1',
                'name' => 'authentication',
                'username' => 'root',
                'password' => 'root',
                'charset' => 'utf8',
                'collation' => 'utf8_unicode_ci',
                'perfix' => ''
            ],

            'auth' => [
                'session' => 'user_id',
                'remember' => 'user_remember'
            ],

            'mail' => [
                'smtp_auth' => true,
                'smtp_secure' => 'tls',
                'host' => 'smtp.gmail.com',
                'username' => 'mamun.conromo@gmail.com',
                'password' => '01734705286pr..',
                'port' => 587,
                'html' => true
            ],

            'twig' => [
                'debug' => true
            ],

            'csrf' => [
                'session' => 'csrf_token'
            ]

            ];
?>















