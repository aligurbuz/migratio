<?php

namespace Migratio\GrammarStructure\Mysql\Traits;

trait QueryStack
{
    /**
     * @return mixed
     */
    public function showTables()
    {
       return $this->getConnection()->query('SHOW TABLES')->fetchAll();
    }

    /**
     * @param $table
     * @return mixed
     */
    public function showColumnsFrom($table)
    {
        return $this->getConnection()->query('SHOW COLUMNS FROM '.$table)->fetchAll();
    }

}

