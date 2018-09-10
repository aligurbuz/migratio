<?php

namespace Migratio\Contract;

interface SchemaCapsuleContract {

    /**
     * @param callable $callback
     * @return mixed
     */
    public function create(callable $callback);


}