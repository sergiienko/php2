<?php

use App\Models\User;

require __DIR__ . '/autoload.php';

$users = User::findAll();

var_dump($users);

$user = new User();
$user->name = 'John';
$user->email = 'john@snow.com';
$user->insert();
