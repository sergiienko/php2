<?php

namespace App;

class Db
{
    use Singleton;
    
    protected $dbh;
    
    protected function __construct()
    {
        $config = Config::instance();
        $this->dbh = new \PDO(
            'mysql:host=' . $config->data['db']['host'] . ';dbname=' . $config->data['db']['name'] . ';', 
            $config->data['db']['username'],
            $config->data['db']['password'] 
        );
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        return $res;
    }

    public function query($sql, $class='\stdClass', $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if(false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }

    public function lastInsertedId() {
        return $this->dbh->lastInsertId();
    }
}
