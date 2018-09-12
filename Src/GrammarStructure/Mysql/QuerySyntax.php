<?php

namespace Migratio\GrammarStructure\Mysql;


class QuerySyntax
{

    public function syntaxCreate()
    {
        $object         = $this->object;
        $names          = $object->getNames();
        $types          = $object->getTypes();
        $default        = $object->getDefault();
        $autoIncrement  = $object->getAutoIncrement();
        $primaryKey     = $object->getPrimaryKey();
        $tableCollation = $object->getCollation();
        $engine         = $object->getEngine();
        $nullable       = $object->getNullable();

        $syntax = 'CREATE TABLE '.$this->table.' (';

        $list = [];

        foreach ($names as $key=>$name)
        {
            $nullableValue          = $this->getNullableValue($nullable,$name);
            $autoIncrementValue     = (isset($autoIncrement[$name])) ? 'AUTO_INCREMENT' : '';
            $primaryKeyValue        = (isset($primaryKey[$name])) ? 'PRIMARY KEY' : '';
            $defaultValue           = (isset($default[$name])) ? ' DEFAULT "'.$default[$name].'"' : '';

            $list[]=''.$name.' '.$types[$key].' '.$nullableValue.' '.$defaultValue.' '.$primaryKeyValue.' '.$autoIncrementValue.'';
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

        $query=$this->schema->getConnection()->setQueryBasic($syntax);

        return [
            'syntax'=>$syntax,
            'type'=>'create',
            'result'=>$query['result'],
            'message'=>$query['message'],
            ];

    }

    /**
     * @param $nullable
     * @param $name
     * @return string
     */
    protected function getNullableValue($nullable,$name)
    {
        $nullableValue='';

        if(isset($nullable[$name])){
            if($nullable[$name]===false){
                $nullableValue='NOT NULL';
            }
            else{
                $nullableValue='NULL';
            }
        }

        return $nullableValue;
    }

}

