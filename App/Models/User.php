<?php

namespace App\Models;


class User extends Model
{
    const TABLE = 'users';

    public $email;
    public $name;
}
