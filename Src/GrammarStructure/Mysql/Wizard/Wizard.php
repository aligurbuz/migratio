<?php

namespace Migratio\GrammarStructure\Mysql\Wizard;

use Migratio\Contract\WizardContract;

class Wizard extends WizardHelper implements WizardContract
{
    /**
     * @var array $error
     */
    protected $error = array();

    /**
     * @var array
     */
    protected $auto_increment=array();

    /**
     * @var array $primaryKey
     */
    protected $primaryKey=array();

    /**
     * @var $schemaType
     */
    protected $schemaType;

    /**
     * @var $file
     */
    protected $file;

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
        $this->types[]=''.$type.'('.$value.')';
    }

    /**
     * @return mixed
     */
    private function getLastName(){

        return end($this->name);
    }

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
     * @param $name
     * @return Types
     */
    public function name($name)
    {
        if(in_array($name,$this->name)){
           $this->setError('You have written the '.$name.' name more than 1.');
        }

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

    public function primaryKey()
    {
        $this->primaryKey[$this->getLastName()]=true;

        return $this;
    }
}

