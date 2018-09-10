<?php

namespace Migratio\GrammarStructure\Mysql\Wizard;

use Migratio\Contract\WizardContract;

class Types
{
    /**
     * @var $wizard WizardContract
     */
    protected $wizard;

    /**
     * Types constructor.
     * @param $wizard
     */
    public function __construct($wizard)
    {
       $this->wizard=$wizard;
    }

    /**
     * @param int $value
     * @return WizardContract
     */
    public function int($value=11)
    {
        $this->wizard->setTypes(__FUNCTION__,$value);

        return $this->wizard;
    }

    /**
     * @param $value
     * @return WizardContract
     */
    public function char($value)
    {
        $this->wizard->setTypes(__FUNCTION__,$value);

        return $this->wizard;
    }

    /**
     * @param $value
     * @return WizardContract
     */
    public function varchar($value)
    {
        $this->wizard->setTypes(__FUNCTION__,$value);

        return $this->wizard;
    }

    /**
     * @param $value
     * @return WizardContract
     */
    public function tinytext($value)
    {
        $this->wizard->setTypes(__FUNCTION__,$value);

        return $this->wizard;
    }
}

