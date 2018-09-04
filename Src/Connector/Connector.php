<?php

namespace Migratio\Connector;

class Connector
{
    /**
     * @var string
     */
    protected $driver;

    /**
     * @var $connector
     */
    protected $connector;

    /**
     * @return mixed
     */
    public function setConnector()
    {
        $driver             = ucfirst($this->config['database']['driver']);
        $driverNamespace    = 'Migratio\\Connector\\'.$driver.'';
        $this->connector    = new $driverNamespace($this->config['database']);
    }

    /**
     * @return mixed
     */
    public function getConnection()
    {
        return $this->connector;
    }
}
