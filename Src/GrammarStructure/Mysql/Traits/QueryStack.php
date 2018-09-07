<?php

namespace Migratio\GrammarStructure\Mysql\Traits;

trait QueryStack
{
    /**
     * @return mixed
     */
    public function connection()
    {
        return $this->schema->getConnection();
    }

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

    /**
     * @param $query
     * @return mixed
     */
    public function setQueryBasic($query)
    {
        return $this->connection()->query($query);
    }

}

