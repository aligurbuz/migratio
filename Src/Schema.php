<?php

namespace Migratio;

use Migratio\Resource\SqlResource;
use Migratio\Resource\SqlDefinitor;
use Migratio\Contract\SchemaContract;
use Migratio\Resource\PullManager\Pulling;
use Migratio\Resource\PushManager\Pushing;

class Schema implements SchemaContract
{
    /**
     * @var $config
     */
    protected $config;

    /**
     * @var $connection
     */
    protected $connection;

    /**
     * Schema constructor.
     * @param null $config
     */
    public function __construct($config=null)
    {
        $this->config=$config;

        $this->connection = (new SqlDefinitor($this->config))->getConnection();
    }

    /**
     * @return Pulling|mixed
     */
    public function pull()
    {
        $pulling = new Pulling($this->connection);

        return $pulling->get();
    }

    /**
     * @return Pushing|mixed
     */
    public function push()
    {
        $pushing = new Pushing($this->connection);

        return $pushing->get();
    }
}