<?php

namespace Resta\Migration\Src\Contract;

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