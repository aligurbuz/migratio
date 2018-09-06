<?php

namespace Migratio\Resource\Request;

class BaseRequestProcess
{
    /**
     * @var $paths
     */
    public static $paths;

    /**
     * @param $path
     */
    public static function chmod($path) {

        $dir = new \DirectoryIterator($path);

        foreach ($dir as $item) {

            chmod($item->getPathname(), 0777);

            if ($item->isDir() && !$item->isDot()) {
                self::chmod($item->getPathname());
            }
        }
    }

    /**
     * @return array
     */
    public static function getAllDirectories()
    {
        $list = [];

        $paths = self::$paths;

        foreach ($paths as $path){
            $list = array_filter(glob($path.'/*'), 'is_dir');
        }

        return $list;
    }

    /**
     * @return array
     */
    public static function getAllFiles()
    {
        $paths = self::$paths;

        $directories = self::getAllDirectories($paths);

        $list = [];

        foreach ($directories as $directory){

            foreach (glob($directory."/*.php") as $file) {

                $list[self::getFileName($directory)][]=$file;
            }
        }

        return $list;
    }

    /**
     * @param $path
     * @return string
     */
    public static function getFileName($path)
    {
        $pathParse = explode ("/",$path);

        return strtolower(end($pathParse));
    }

    /**
     * @param $tables
     */
    public static function setDirectoryForTableNames($tables)
    {
        $directories = self::getAllDirectories();

        $mainPath = self::$paths[0].'';

        $mkdirResults = [];

        foreach ($tables as $table){
            if(!isset($directories[$table])){

                //get path and set mkdir
                $path = $mainPath.'/'.ucfirst($table);
                if(!file_exists($path)){
                   $mkdirResults[] = mkdir($path, 0777);
                }

            }
        }

        //mkdir result false exception
        if(in_array(false,$mkdirResults)){
            throw new \InvalidArgumentException('Creating directory is fail');
        }

        dd(self::getAllDirectories(),$tables,$mkdirResults);
    }
}

