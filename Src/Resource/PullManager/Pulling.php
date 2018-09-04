<?php

namespace Migratio\Resource\PullManager;

use Migratio\Contract\QueryBaseContract;

class Pulling
{
    /**
     * @var $connection QueryBaseContract
     */
    protected $connection;

    /**
     * Pulling constructor.
     * @param $connection
     */
    public function __construct($connection)
    {
        $this->connection=$connection;
    }

    /**
     * @return mixed
     */
    public function get()
    {
        $tables = $this->connection->getTables();

        return $tables;
    }
}