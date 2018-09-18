<?php

namespace Migratio\GrammarStructure\Mysql\Wizard;

use Migratio\Contract\WizardAlterContract;
use Migratio\Contract\WizardAlterGroupContract;

class WizardAlterGroup implements WizardAlterGroupContract
{
    /**
     * @param $field
     * @return WizardAlterContract
     */
    public function addColumn()
    {
        return $this->getWizardAlterInstance(__FUNCTION__);
    }

    /**
     * @param $field
     * @return WizardAlterContract
     */
    public function change()
    {
        return $this->getWizardAlterInstance(__FUNCTION__);
    }

    /**
     * @param $group
     * @return WizardAlter
     */
    private function getWizardAlterInstance($group)
    {
        return new WizardAlter($group);
    }
}

