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
        $coment         = $object->getComment();
        $unique         = $object->getUnique();
        $index          = $object->getIndex();

        $syntax = 'CREATE TABLE '.$this->table.' (';

        $list = [];
        $uniqueValueList = [];
        $indexValueList = [];

        foreach ($names as $key=>$name)
        {
            $nullableValue          = $this->getNullableValue($nullable,$name);
            $autoIncrementValue     = (isset($autoIncrement[$name])) ? 'AUTO_INCREMENT' : '';
            $primaryKeyValue        = (isset($primaryKey[$name])) ? 'PRIMARY KEY' : '';
            $defaultValue           = (isset($default[$name])) ? ' DEFAULT "'.$default[$name].'"' : '';
            $commentValue           = (isset($coment[$name])) ? ' COMMENT "'.$coment[$name].'"' : '';

            //get unique
            if(isset($unique[$name])){
                $uniqueValueList[]      = 'UNIQUE INDEX '.$unique[$name]['name'].' ('.$unique[$name]['value'].' ASC)';
            }

            //get index
            if(isset($index[$name])){
                $indexValueList[]      = 'INDEX '.$index[$name]['name'].' ('.$index[$name]['value'].')';
            }

            $list[]=''.$name.' '.$types[$key].' '.$nullableValue.' '.$defaultValue.' '.$primaryKeyValue.' '.$autoIncrementValue.' '.$commentValue.'';
        }

        $syntax.=implode(",",$list);

        if(count($uniqueValueList)){

            //get unique values
            $syntax.=','.implode(',',$uniqueValueList);
        }


        if(count($indexValueList)){

            //get index values
            $syntax.=','.implode(',',$indexValueList);
        }



        $syntax.=')';


        //get table collation
        if(isset($tableCollation['table'])){
            $syntax.=' DEFAULT CHARACTER SET '.$tableCollation['table'];
        }
        else{
            $syntax.=' DEFAULT CHARACTER SET utf8';
        }

        //get engine
        if($engine!==null)
        {
            $syntax.=' ENGINE='.$engine.' ';
        }
        else{
            $syntax.=' ENGINE=InnoDB ';
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

