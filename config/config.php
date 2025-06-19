<?php
return [
    'db' => [
        'host' => 'localhost',
        'name' => 'db_name',
        'user' => 'user_name',
        'pass' => 'user_password',
        'charset' => 'utf8mb4'
    ],
    'misc' => [
        'title' => 'Insects bug tracker',
        'description' => 'Insects bug tracker',
        'url' => 'https://insects.org',
        'greeting' => 'Hello world!'
    ],
    'smtp' => [
        'host'       => 'smtp.example.com',
        'port'       => 465,
        'encryption' => 'tls',                  // 'tls', 'ssl'
        'user'       => 'your@email.com',
        'password'   => 'your_password',
        'from_email' => 'your@email.com',
        'from_name'  => 'Insects Bug Tracker'
    ]

];
