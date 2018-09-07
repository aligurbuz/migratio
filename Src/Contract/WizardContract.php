<?php

namespace Migratio\Contract;

use Migratio\GrammarStructure\Mysql\Wizard\Types;

interface WizardContract {

    /**
     * @return mixed
     */
    public function auto_increment();

    /**
     * @param $value
     * @return Types
     */
    public function name($value);

    /**
     * @param $value
     * @return $this
     */
    public function default($value);

    /**
     * @param bool $null
     * @return $this
     */
    public function nullable($null=true);

    /**
     * @return mixed
     */
    public function primaryKey();

}

