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
        $tableCollation = $object->getCollation();
        $engine         = $object->getEngine();

        $syntax = 'CREATE TABLE '.$this->table.' (';

        $list = [];

        foreach ($names as $key=>$name)
        {
            $autoIncrementValue     = (isset($autoIncrement[$name])) ? 'AUTO_INCREMENT' : '';
            $primaryKeyValue        = (isset($primaryKey[$name])) ? 'PRIMARY KEY' : '';

            $list[]=''.$name.' '.$types[$key].' '.$primaryKeyValue.' '.$autoIncrementValue.'';
        }

        $syntax.=implode(",",$list);

        $syntax.=')';

        //get table collation
        if(isset($tableCollation['table'])){
            $syntax.=' DEFAULT CHARACTER SET '.$tableCollation['table'];
        }

        //get engine
        if($engine!==null)
        {
            $syntax.=' ENGINE='.$engine.' ';
        }

        $syntax.=';';

        return [
            'syntax'=>$syntax,
            'result'=>$this->schema->getConnection()->setQueryBasic($syntax)
            ];

    }

}

