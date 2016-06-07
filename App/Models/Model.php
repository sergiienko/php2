<?php

namespace App\Models;

use App\Db;


abstract class Model
{
    const TABLE = '';
    
    public $id;
    
    public static function findAll()
    {
        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class
        );
    }

    public static function findById($id)
    {
        $db = Db::instance();
        $res = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id = :id',
            [':id' => $id],
            static::class
        );
        
        if (!empty($res)) {
            return $res[0];
        }
        return false;
    }

    public function isNew()
    {
        return empty($this->id);
    }
    
    public function insert()
    {
        if (!$this->isNew()) {
            return;
        }
        
        $columns = [];
        $values = [];
        
        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }
        
        
        $sql = 'INSERT INTO ' . static::TABLE . ' (' . implode(', ', $columns) . ') VALUES (' . implode(', ', array_keys($values)) . ')';

        $db = Db::instance();
        $db->execute($sql, $values);
        
        $this->id = $db->lastInsertedId();
    }

    public function update()
    {
        if ($this->isNew()) {
            return;
        }

        $columns = [];
        $values = [];

        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k . '=:' . $k;
            $values[':' . $k] = $v;
        }
        
        $sql = 'UPDATE ' . static::TABLE . ' SET ' . implode(', ', $columns) . ' WHERE id=:id';

        $values[':id'] = $this->id;
        
        $db = Db::instance();
        $db->execute($sql, $values);
    }
    
    public function save()
    {
        if ($this->isNew()) {
            $this->insert();
        } else {
            $this->update();
        }
    }
    
    public function delete()
    {
        if ($this->isNew()) {
            return;
        }
        
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id';

        $db = Db::instance();
        $db->execute($sql, [':id' => $this->id]);
        
    }
        
}