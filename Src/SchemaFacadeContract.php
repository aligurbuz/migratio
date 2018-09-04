<?php

namespace Resta\Migration\Src;

interface SchemaFacadeContract {

    /**
     * @param null $appName
     * @return mixed
     */
    public function pull($appName=null);

    /**
     * @param null $appName
     * @return mixed
     */
    public function push($appName=null);
}