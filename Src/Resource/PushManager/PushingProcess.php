<?php

namespace Migratio\Resource\PushManager;

use Migratio\GrammarStructure\Mysql\QueryBuilder;

trait PushingProcess
{
    /**
     * @return void
     */
    public function processHandler()
    {
        return $this->errorHandler(function(){

            foreach ($this->list as $table =>$datas){
                foreach ($datas as $data){
                    $queryBuilder = $this->schema->getGrammarPath().'\QueryBuilder';
                    (new $queryBuilder($this->schema,$table,$data,$this->connection))->handle();
                }
            }
        });
    }

    /**
     * @param callable $callback
     */
    public function errorHandler(callable $callback)
    {
        foreach ($this->list as $table => $objects)
        {
            foreach ($objects as $object)
            {
                if(count($object->getError())){
                    return 'error : '.$object->getFile().' -> '.$object->getError()[0].'';
                }
            }
        }

        return call_user_func($callback);
    }
}