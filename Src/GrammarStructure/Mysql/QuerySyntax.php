<?php

namespace Migratio\GrammarStructure\Mysql;

class QuerySyntax
{

    public function syntaxCreate()
    {
        $object         = $this->object;
        $names          = $object->getNames();
        $types          = $object->getTypes();
        $autoIncrement  = $object->getAutoIncrement();
        $primaryKey     = $object->getPrimaryKey();

        $syntax = 'CREATE TABLE '.$this->table.' (';

        $list = [];

        foreach ($names as $key=>$name)
        {
            $autoIncrementValue     = (isset($autoIncrement[$name])) ? 'AUTO_INCREMENT' : '';
            $primaryKeyValue        = (isset($primaryKey[$name])) ? 'PRIMARY KEY' : '';

            $list[]=''.$name.' '.$types[$key].' '.$primaryKeyValue.' '.$autoIncrementValue.'';
        }

        $syntax.=implode(",",$list);

        $syntax.=');';

        dd($this->schema->getConnection()->setQueryBasic($syntax));

        dd($syntax,$this->object->getNames(),$this->object,$this->object->getTypes());

    }

}

