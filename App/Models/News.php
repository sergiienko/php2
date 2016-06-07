<?php

namespace App\Models;

use App\Db;

class News
    extends Model
{
    const TABLE = 'news';
    
    public $title;
    public $text;

    public static function getRecent() {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM '. self::TABLE . ' ORDER BY id DESC LIMIT 5',
            [],
            self::class
        );
    }

}