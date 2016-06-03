<?php

namespace App;

class Db
{
    use Singleton;
    
    protected $dbh;
    
    protected function __construct()
    {
        $this->dbh = new \PDO('mysql:host=127.0.0.1;dbname=php2;', 'php2', 'php2');
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        return $res;
    }

    public function query($sql, $params = [], $class='\stdClass')
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if(false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }
}
