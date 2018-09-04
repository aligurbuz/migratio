<?php

namespace Resta\Migration\Src;

use Resta\Migration\Src\Contract\SchemaContract;

class Schema implements SchemaContract
{
    /**
     * @var $config
     */
    protected $config;

    /**
     * Schema constructor.
     * @param null $config
     */
    public function __construct($config=null)
    {
        $this->config=$config;
    }

    /**
     * @return string
     */
    public function pull(){

        return 'pull xxx';
    }

    /**
     * @return string
     */
    public function push(){

        return 'push';
    }
}