<?php

namespace Migratio\Contract;

use Migratio\GrammarStructure\Mysql\Wizard\EngineProperties;

interface TablePropertiesContract {

    /**
     * @param string $value
     * @return mixed
     */
    public function collation($value='utf8');

    /**
     * @return EngineProperties
     */
    public function engine();

}

