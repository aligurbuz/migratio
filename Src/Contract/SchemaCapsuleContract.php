<?php

namespace Migratio\Contract;

interface SchemaCapsuleContract {

    /**
     * @param $type
     * @param callable $callback
     * @return mixed
     */
    public function migrate($type,callable $callback);


}