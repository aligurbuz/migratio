<?php

namespace Migratio\GrammarStructure\Mysql\Wizard\Foreign;

use Migratio\Contract\Foreign\ReferencesContract;

class References implements ReferencesContract
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
     * @param $table
     * @param string $field
     * @return \Migratio\Contract\Foreign\OptionsContract
     */
    public function references($table, $field = 'id')
    {
        return new Options($this->wizard);
    }
}