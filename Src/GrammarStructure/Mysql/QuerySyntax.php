<?php

namespace Migratio\GrammarStructure\Mysql;

class QuerySyntax extends QuerySyntaxHelper
{
    /**
     * @var array $data
     */
    protected $data = array();
    /**
     * @var array $syntax
     */
    protected $syntax = array();

    /**
     * @return array
     */
    public function syntaxCreate()
    {
        $this->getWizardObjects($this->object);

        $this->getCreateTableSyntax();

        $this->syntax[]=implode(",",$this->getCreateDefaultList());

        //get unique values
        if(isset($this->data['uniqueValueList']) && count($this->data['uniqueValueList'])){
            $this->syntax[]=','.implode(',',$this->data['uniqueValueList']);
        }

        //get index values
        if(isset($this->data['indexValueList']) && count($this->data['indexValueList'])){
            $this->syntax[]=','.implode(',',$this->data['indexValueList']);
        }

        //get index values for key
        if(count($this->getKeyList())){
            $this->syntax[]=','.implode(',',$this->getKeyList());
        }

        if(count($this->data['references'])){
            $this->syntax[]=$this->getReferenceSyntax($this->data['references']);
        }

        $this->syntax[]=')';

        //get table collation
        if(isset($this->data['tableCollation']['table'])){
            $this->syntax[]=' DEFAULT CHARACTER SET '.$this->data['tableCollation']['table'];
        }
        else{
            $this->syntax[]=' DEFAULT CHARACTER SET utf8';
        }

        //get engine
        if($this->data['engine']!==null)
        {
            $this->syntax[]=' ENGINE='.$this->data['engine'].' ';
        }
        else{
            $this->syntax[]=' ENGINE=InnoDB ';
        }

        $syntax = implode("",$this->syntax);

        $query=$this->schema->getConnection()->setQueryBasic($syntax);

        return [
            'syntax'=>$syntax,
            'type'=>'create',
            'result'=>$query['result'],
            'message'=>$query['message'],
            ];
    }
}

