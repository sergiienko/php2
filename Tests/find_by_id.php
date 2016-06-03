<?php

use App\Models\User;

require __DIR__ . '/../autoload.php';

$user = User::findById(3);
var_dump($user);

$user = User::findById(0);
var_dump($user);

