<?php

namespace Migratio\Resource\StubManager;

use Migratio\Schema;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;

class Stubber
{
    /**
     * @var $config
     */
    protected $config;

    /**
     * @var $schema Schema
     */
    protected $schema;

    /**
     * @var $stubber
     */
    protected $stubber;

    /**
     * @var $file
     */
    protected $file;

    public function __construct($schema)
    {
        $this->file     = new Filesystem();
        $this->stubber  = realpath(__DIR__.'/../../Stub');
        $this->schema   = $schema;
        $this->config   = $this->schema->getConfig();
    }

    /**
     * @param $params
     * @return array
     */
    private function getPaths($params)
    {
        if(!isset($params[3])){
            return [$this->config['paths'][0]];
        }
    }

    /**
     * @param $executionPath
     * @param $path
     * @param $params
     * @return bool
     */
    private function fopenprocess($executionPath,$path,$params){

        $dt = fopen($executionPath, "r");
        $content = fread($dt, filesize($executionPath));
        fclose($dt);

        foreach ($params as $key=>$value){

            $content=str_replace("__".$key."__",$value,$content);
        }


        $dt = fopen($path, "w");
        fwrite($dt, $content);
        fclose($dt);

        return true;


    }

    /**
     * @param $params
     */
    public function handle($params)
    {
        list($table,$type,$name) = $params;

        $paths = $this->getPaths($params);

        foreach ($paths as $path){

            $tableDirectory = $path.'/'.ucfirst($table);

            if($type == 'create'){

                $this->file->mkdir($tableDirectory,0777);

                $fileName = ucfirst($name);

                $filePath = $tableDirectory.'/'.$fileName.'.php';

                $this->file->touch($filePath);

                $stubber = $this->stubber.'/create.stub';

                $this->fopenprocess($stubber,$filePath,['className'=>$fileName]);


                $this->file->chmod($tableDirectory,0777,000,true);
            }
        }

        dd($this->config['paths'],$params);
    }
}

