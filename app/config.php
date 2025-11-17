<?php
return [
    'database' => [
        'name' => 'cursophp',
        'username' => 'userCurso',
        'password' => 'php',
        'connection' => 'mysql:host=localhost',
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ]
    ],
    'mailer' => [
        'smtp_server' => 'smtp.gmail.com',
        'smtp_port' => '587',
        'smtp_security' => 'gmail tls',
        'username' => '',
        'password' => '',
        'email' => '',
        'name' => ''
    ],
    'logs' => [
        'filename' => 'curso.log',
        'level' => \Monolog\Level::Info
    ],
    'routes' => [
        'filename' => 'routes.php'
    ],
    'project' => [
        'namespace' => 'dwes'
    ]
];
