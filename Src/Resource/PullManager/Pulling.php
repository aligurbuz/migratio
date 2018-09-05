<?php

namespace Migratio\Resource\PullManager;

use Migratio\Schema;
use Migratio\Resource\BaseManager;
use Migratio\Contract\QueryBaseContract;

class Pulling extends BaseManager
{
    /**
     * @return mixed
     */
    public function get()
    {
        $tables = $this->getColumns()->fields();

        return $tables;
    }
}