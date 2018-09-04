<?php

namespace Migratio\Resource\PushManager;

class Pushing
{
    /**
     * @var $connection
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