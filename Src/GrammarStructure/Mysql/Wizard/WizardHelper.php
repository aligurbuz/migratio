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

    public function setFile($file)
    {
        $this->file = $file;
    }
}

