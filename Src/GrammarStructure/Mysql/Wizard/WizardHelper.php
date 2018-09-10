<?php

namespace Migratio\GrammarStructure\Mysql\Wizard;

class WizardHelper
{
    /**
     * @return mixed
     */
    public function getAutoIncrement()
    {
        return $this->auto_increment;
    }

    /**
     * @return mixed
     */
    public function getDefault()
    {
        return $this->default;
    }

    /**
     * @return mixed
     */
    public function getEngine()
    {
        return $this->engine;
    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }

    public function getFile()
    {
        return $this->file;
    }

    /**
     * @return mixed
     */
    public function getNames()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function getSchemaType()
    {
        return $this->schemaType;
    }

    /**
     * @return mixed
     */
    public function getTypes()
    {
        return $this->types;
    }

    /**
     * @param $message
     */
    public function setError($message)
    {
        $this->error[]=$message;
    }

    /**
     * @param $engine
     */
    public function setEngine($engine)
    {
        $this->engine=$engine;
    }

    /**
     * @param $file
     */
    public function setFile($file)
    {
        $this->file = $file;
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
        $this->types[]=''.$type.'('.$value.')';
    }

    /**
     * @return mixed
     */
    protected function getLastName(){

        return end($this->name);
    }

    /**
     * @param $collation
     */
    public function getCollation()
    {
        return $this->collation;
    }


}

