<?php

namespace Migratio\GrammarStructure\Mysql\Wizard\Foreign;

use Migratio\Contract\Foreign\OptionsContract;

class Options implements OptionsContract
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
     * @return \Migratio\Contract\Foreign\OptionsPropertiesContract
     */
    public function onDelete()
    {
        return new OptionsProperties($this->wizard);
    }

    /**
     * @return \Migratio\Contract\Foreign\OptionsPropertiesContract
     */
    public function onUpdate()
    {
        return new OptionsProperties($this->wizard);
    }

}