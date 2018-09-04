<?php

namespace Migratio\Contract;

interface SchemaContract {

    /**
     * @return mixed
     */
    public function pull();

    /**
     * @return mixed
     */
    public function push();
}