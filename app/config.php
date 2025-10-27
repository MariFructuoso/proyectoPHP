<?php
return [
    'database' => [
        'name' => 'cursophp',
        'username' => 'root',
        'password' => 'root',
        'connection' => 'mysql:host=127.0.0.1;port=8889;dbname=cursophp;charset=utf8',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => true
        ]
    ]
];
