<?php

namespace App\Models;

use App\Db;

/**
 * Class News
 * @package App\Models
 *
 * @property \App\Models\Author $author
 */
class News extends Model
{
    const TABLE = 'news';
    
    public $title;
    public $text;
    public $author_id;

    public static function getRecent() {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM '. self::TABLE . ' ORDER BY id DESC LIMIT 5',
            self::class
        );
    }

    /**
     * Lazy loading.
     *
     * @param string $name
     * @return Author|null
     */
    public function __get($name)
    {
        switch ($name) {
            case 'author':
                return Author::findById($this->author_id);
                break;
            default:
                return null;
        }
    }

    /**
     * @param $name
     * @return bool
     */
    public function __isset($name) {
        switch ($name) {
            case 'author':
                return !empty($this->author_id);
                break;
            default:
                return false;
        }
    }

}
