<?php

namespace Migratio\GrammarStructure\Mysql\Wizard;

use Migratio\Contract\WizardContract;
use Migratio\Contract\TablePropertiesContract;

class TableProperties implements TablePropertiesContract
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
     * @param string $value
     * @return mixed|void
     */
    public function collation($value = 'utf8')
    {
        $this->wizard->collation($value,'true');
    }

    /**
     * @return EngineProperties|mixed
     */
    public function engine()
    {
        return new EngineProperties($this->wizard);
    }


}

