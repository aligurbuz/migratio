<?php

namespace Migratio\Resource\PullManager;

use Migratio\Schema;
use Migratio\Resource\BaseManager;
use Migratio\Contract\QueryBaseContract;
use Migratio\Resource\Request\BaseRequestProcess;

class Pulling extends BaseManager
{
    /**
     * @return mixed
     */
    public function get()
    {
        BaseRequestProcess::$paths=$this->config['paths'];

        $tables = BaseRequestProcess::getAllFiles();

        dd(BaseRequestProcess::setDirectoryForTableNames($this->getTables()));

        return $tables;
    }
}