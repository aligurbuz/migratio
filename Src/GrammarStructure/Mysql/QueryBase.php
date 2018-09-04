<?php

namespace Migratio\GrammarStructure\Mysql;

use Migratio\Contract\QueryBaseContract;

class QueryBase implements QueryBaseContract
{
    /**
     * @return mixed
     */
    protected function connection()
    {
        return $this->getConnection();
    }

    /**
     * @return array|mixed
     */
    public function getTables()
    {
        $tables = $this->getConnection()->query('SHOW TABLES')->fetchAll();

        $list = [];

        foreach ($tables as $key=>$resource){

            $list[$key] = $resource[0];
        }

        return $list;
    }
}

