<?php

namespace Migratio\Connector;

use Migratio\GrammarStructure\Mysql\QueryBase;

class Mysql extends QueryBase
{
    /**
     * @var $connection
     */
    protected $connection;

    /**
     * Mysql constructor.
     * @param $config
     */
    public function __construct($config)
    {
        //get pdo dsn
        $dsn=''.$config['driver'].':host='.$config['host'].';dbname='.$config['database'].'';
        $this->connection = new \PDO($dsn, $config['user'], $config['password']);
    }

    /**
     * @return \PDO
     */
    public function getConnection(){
        return $this->connection;
    }

}