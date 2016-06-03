<?php

use App\Db;

require __DIR__ . '/../autoload.php';

$db = Db::instance();

$user = $db->execute('INSERT INTO users (email, name) VALUES (:email, :name)', [':email' => 'test@test.com', ':name' => 'Test']);

var_dump($user);

$user = $db->query('SELECT * FROM users WHERE id = :id', [':id' => 2]);

var_dump($user);

$user = $db->query('SELECT * FROM users WHERE email LIKE :pattern', [':pattern' => '%john%']);

var_dump($user);
