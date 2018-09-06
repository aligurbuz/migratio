<?php

namespace Migratio\GrammarStructure\Mysql\Wizard;

use Migratio\Contract\WizardContract;

class Wizard extends WizardHelper implements WizardContract
{
    /**
     * @var array
     */
    protected $auto_increment=array();

    /**
     * @var $schemaType
     */
    protected $schemaType;

    /**
     * @var $name array
     */
    protected $name=array();

    /**
     * @var array $nullable
     */
    protected $nullable=array();

    /**
     * @var array $types
     */
    protected $types=array();

    /**
     * @var $default array
     */
    protected $default=array();

    /**
     * @return mixed|void
     */
    public function auto_increment()
    {
        if(count($this->auto_increment)==0){
            $this->auto_increment[$this->getLastName()]=true;
        }
    }

    /**
     * @param $schemaType
     */
    public function schemaType($schemaType)
    {
        $this->schemaType=$schemaType;
    }

    /**
     * @param $type
     */
    public function setTypes($type,$value)
    {
        $this->types[]=''.$type.' '.$value.'';
    }

    /**
     * @param $name
     * @return Types
     */
    public function name($name)
    {
        $this->name[]=$name;

        return new Types($this);

    }

    /**
     * @param $value
     * @return $this|mixed
     */
    public function default($value)
    {
        $this->default[$this->getLastName()]=$value;

        return $this;
    }

    /**
     * @param bool $null
     * @return $this
     */
    public function nullable($null=true)
    {
        $this->nullable[$this->getLastName()]=$null;

        return $this;
    }

    /**
     * @return mixed
     */
    private function getLastName(){

        return end($this->name);
    }
}

