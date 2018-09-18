<?php

namespace Migratio\GrammarStructure\Mysql\Wizard;

use Migratio\Contract\WizardContract;
use Migratio\Contract\WizardAlterContract;

class WizardAlter extends Wizard implements WizardContract,WizardAlterContract
{
    /**
     * @var $after
     */
    protected $after;

    /**
     * @var $group
     */
    protected $group;

    /**
     * WizardAlter constructor.
     * @param $group
     */
    public function __construct($group)
    {
        $this->group=$group;
    }

    /**
     * @param $field
     * @return $this
     */
    public function after($field)
    {
        $this->after[$this->getLastName()]=$field;

        return $this;
    }
}

