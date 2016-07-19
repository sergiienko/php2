<?php

namespace App\Models;

use App\Db;

class News extends Model
{
    const TABLE = 'news';
    
    public $title;
    public $text;

    public static function getRecent() {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM '. self::TABLE . ' ORDER BY id DESC LIMIT 5',
            self::class
        );
    }

    public function __get($name)
    {
        if ($name == 'author' && ! empty($this->author_id)) {
            return Author::findById($this->author_id);
        }
    }

}