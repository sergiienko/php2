<?php

namespace App\Models;

use App\Db;


abstract class Model
{
    const TABLE = '';
    
    public static function findAll()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }
}