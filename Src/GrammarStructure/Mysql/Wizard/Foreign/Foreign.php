<?php

namespace Migratio\GrammarStructure\Mysql\Wizard\Foreign;

use Migratio\Contract\Foreign\ForeignContract;
use Migratio\Contract\Foreign\ReferencesContract;

class Foreign implements ForeignContract
{
    /**
     * @var $wizard WizardContract
     */
    protected $wizard;

    /**
     * Types constructor.
     * @param $wizard WizardContract
     * @param $wizard
     */
    public function __construct($wizard)
    {
        $this->wizard=$wizard;
    }

    /**
     * @param $constraint
     * @return $this|ForeignContract
     */
    public function constraint($constraint)
    {
        return $this;
    }

    /**
     * @param $key
     * @return $this|ReferencesContract
     */
    public function key($key)
    {
        return new References($this->wizard);
    }


}