<?php

namespace Migratio\Resource\PushManager;

use Migratio\Resource\BaseManager;

class Pushing extends BaseManager
{
    /**
     * @return mixed
     */
    public function get()
    {
        $tables = $this->getTables();

        return $tables;
    }
}