<?php

namespace Migratio;

use Migratio\Schema;
use Migratio\Contract\SchemaContract;

class SchemaFacade {

    /**
     * @var $instance
     */
    protected static $instance;

    /**
     * @var $schema
     */
    protected $schema;

    /**
     * @var array
     */
    protected static $config=array();

    /**
     * SchemaFacade constructor.
     */
    public function __construct()
    {
        $this->schema=new Schema(self::$config);
    }

    /**
     * @param array $params
     * @return SchemaContract
     */
    public static function setConfig($params=array())
    {
        self::$config=$params;

        return new static();
    }

    /**
     * @param $appName
     * @return SchemaFacade
     */
    public static function getInstance()
    {
        if(is_null(self::$instance)){
            self::$instance=new self();
        }
        return self::$instance;
    }

    /**
     * @param $appName
     * @return \Resta\Migration\Src\Schema
     */
    protected static function getSchema()
    {
        return self::getInstance()->schema;
    }

    /**
     * @return string
     */
    public static function pull()
    {
        return self::getSchema()->pull();
    }

    /**
     * @return string
     */
    public static function push()
    {
        return self::getSchema()->push();
    }
}