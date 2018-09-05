<?php

namespace Migratio\GrammarStructure\Mysql\Traits;

trait QueryStack
{
    /**
     * @return mixed
     */
    public function showTables()
    {
       return $this->connection()->query('SHOW TABLES')->fetchAll();
    }

    /**
     * @param $table
     * @return mixed
     */
    public function showColumnsFrom($table)
    {
        return $this->connection()->query('SHOW COLUMNS FROM '.$table)->fetchAll();
    }

}

