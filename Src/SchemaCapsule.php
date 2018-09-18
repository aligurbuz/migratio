<?php

namespace Migratio;

use Migratio\Contract\SchemaCapsuleContract;

class SchemaCapsule implements SchemaCapsuleContract
{
    /**
     * @var $config
     */
    protected $config;

    /**
     * @var $file
     */
    protected $file;

    /**
     * @var $wizardNamespace
     */
    protected $wizardNamespace;

    /**
     * @var $wizardAlterNamespace
     */
    protected $wizardAlterNamespace;

    /**
     * SchemaCapsule constructor.
     * @param $config
     */
    public function __construct($config,$file)
    {
        $this->config                       = $config;
        $this->file                         = $file;
        $this->wizardNamespace              = $this->getWizardNamespace().'\Wizard';
        $this->wizardAlterGroupNamespace    = $this->getWizardNamespace().'\WizardAlterGroup';
    }

    /**
     * @param callable $callback
     */
    public function alter(callable $callback)
    {
        $wizardInstance = $this->getWizardInstance(__FUNCTION__);

        $callback = call_user_func_array($callback,[$wizardInstance]);

        $this->checkErrors($wizardInstance);

        return $wizardInstance;
    }

    /**
     * @param callable $callback
     */
    public function create(callable $callback)
    {
        $wizardInstance = $this->getWizardInstance(__FUNCTION__);

        $callback = call_user_func_array($callback,[$wizardInstance]);

        $this->checkErrors($wizardInstance);

        return $wizardInstance;
    }

    /**
     * @param $wizard
     */
    private function checkErrors($wizard)
    {
        if(count($wizard->getNames())!==count($wizard->getTypes())){
            $wizard->setError('name and types are not equal');
        }
    }

    /**
     * @return string
     */
    private function getWizardNamespace()
    {
        return 'Migratio\GrammarStructure\\'.ucfirst($this->config['database']['driver']).'\Wizard';
    }

    /**
     * @param $type
     * @return string
     */
    private function getWizardInstance($type)
    {
        $wizard = ($type=="create") ? $this->wizardNamespace : $this->wizardAlterGroupNamespace;
        $wizard = new $wizard;

        $wizard->schemaType($type);

        $wizard->setFile($this->file);

        return $wizard;
    }
}

