<?php

namespace Migratio\GrammarStructure\Mysql\Wizard\Foreign;

use Migratio\Contract\Foreign\OptionsPropertiesContract;

class OptionsProperties implements OptionsPropertiesContract
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
     * @return mixed
     */
    public function cascade()
    {

    }

    /**
     * @return mixed
     */
    public function noAction()
    {

    }

    /**
     * @return mixed
     */
    public function restrict()
    {

    }

    /**
     * @return mixed
     */
    public function setDefault()
    {

    }

    /**
     * @return mixed
     */
    public function setNull()
    {

    }


}