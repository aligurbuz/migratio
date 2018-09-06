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
     * @var $wizardPath
     */
    protected $wizardPath;

    /**
     * SchemaCapsule constructor.
     * @param $config
     */
    public function __construct($config,$file)
    {
        $this->config       = $config;
        $this->file         = $file;
        $this->wizardPath   = 'Migratio\GrammarStructure\\'.ucfirst($this->config['database']['driver']).'\Wizard\Wizard';
    }

    /**
     * @param callable $callback
     */
    public function migrate($type,callable $callback)
    {
        $wizard = $this->wizardPath;
        $wizard = new $wizard;

        $wizard->schemaType($type);

        $callback = call_user_func_array($callback,[$wizard]);

        if(count($wizard->getNames())!==count($wizard->getTypes())){
            throw new \InvalidArgumentException('Name and type values are not equal (in the '.$this->file.')');
        }

        dd($wizard);
    }
}

