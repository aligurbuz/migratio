<?php

namespace Migratio\Resource\PushManager;

use Migratio\Schema;
use Migratio\SchemaCapsule;
use Migratio\Resource\BaseManager;
use Migratio\Contract\QueryBaseContract;
use Migratio\Resource\Request\BaseRequestProcess;

class Pushing extends BaseManager
{
    use PushingProcess;

    /**
     * @var $list array
     */
    protected $list = array();

    /**
     * @return array
     */
    protected function getAllFiles()
    {
        BaseRequestProcess::$paths=$this->config['paths'];

        return BaseRequestProcess::getAllFiles();
    }

    /**
     * @return mixed
     */
    public function handle()
    {
        foreach ($this->tableFilters() as $table=>$files){

            foreach ($files as $file) {

                $className = $this->getClassName($file);

                $require = require_once ($file);

                $capsule = new SchemaCapsule($this->config,$file);

                $this->list[$table][]=(new $className)->up($capsule);
            }
        }

        return $this->processHandler();
    }

    protected function tableFilters()
    {
        $tables = $this->schema->params['tables'];

        $list = [];

        foreach ($this->getAllFiles() as $table=>$allFile) {

            if(count($tables)){

                if(in_array($table,$tables)){
                    $list[$table]=$allFile;
                }
            }
        }

        return (count($list)) ? $list : $this->getAllFiles();
    }

    /**
     * @param $file
     * @return mixed|string
     */
    protected function getClassName($file)
    {
        $className = str_replace(".php","",BaseRequestProcess::getFileName($file));
        $className = ucfirst($className);

        return $className;
    }
}