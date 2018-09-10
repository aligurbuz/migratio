<?php

namespace Migratio\GrammarStructure\Mysql\Wizard;

use Migratio\Contract\TablePropertiesContract;
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
     * @var $collation
     */
    protected $collation;

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
     * @var $engine
     */
    protected $engine;

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
            $this->primaryKey();
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
     * @param $value
     * @param bool $table
     * @return $this
     */
    public function collation($value,$table=false)
    {
        if($table===false)
        {
            $this->collation[$this->getLastName()]=$value;
        }
        else{
            $this->collation['table']=$value;
        }

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

    /**
     * @return TablePropertiesContract
     */
    public function table()
    {
        return new TableProperties($this);
    }
}

