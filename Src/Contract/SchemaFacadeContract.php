<?php

namespace Migratio\Contract;

interface SchemaFacadeContract {

    /**
     * @return mixed
     */
    public function pull();

    /**
     * @return mixed
     */
    public function push();

    /**
     * @param array $tables
     * @return SchemaContract
     */
    public function tables($tables=array());
}