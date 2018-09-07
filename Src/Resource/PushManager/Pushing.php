<?php

namespace Migratio\Resource\PushManager;

use Migratio\Schema;
use Migratio\SchemaCapsule;
use Migratio\Resource\BaseManager;
use Migratio\Contract\QueryBaseContract;
use Migratio\Resource\Request\BaseRequestProcess;

class Pushing extends BaseManager
{
    use PushingProcess;

    /**
     * @var $list array
     */
    protected $list = array();

    /**
     * @return mixed
     */
    public function get()
    {
        BaseRequestProcess::$paths=$this->config['paths'];

        $allFiles = BaseRequestProcess::getAllFiles();

        foreach ($allFiles as $table=>$files){

            foreach ($files as $file) {

                $className = str_replace(".php","",BaseRequestProcess::getFileName($file));
                $className = ucfirst($className);

                $require = require_once ($file);

                $up = new $className;

                $capsule = new SchemaCapsule($this->config,$file);

                $this->list[$table][]=$up->up($capsule);

            }
        }

        return $this->processHandler();
    }
}