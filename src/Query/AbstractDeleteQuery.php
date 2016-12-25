<?php

namespace Ejacobs\QueryBuilder\Query;

use Ejacobs\QueryBuilder\Component\LeftJoinComponent;
use Ejacobs\QueryBuilder\Component\TableComponent;
use Ejacobs\QueryBuilder\Component\WhereComponent;

abstract class AbstractDeleteQuery extends AbstractBaseQuery
{
    /* @var LeftJoinComponent[] $joinComponents */
    protected $joinComponents = [];

    /* @var WhereComponent[] $whereComponents */
    protected $whereComponents = [];

    /**
     * @param $tableName
     * @return $this
     */
    public function from($tableName)
    {
        $this->tableComponent = new TableComponent($tableName);
        return $this;
    }

    /**
     * @param $expression
     * @param $value
     * @return $this
     */
    public function where($expression, $value)
    {
        $this->whereComponents[] = new WhereComponent($expression, $value);
        return $this;
    }

    /**
     * @return array
     */
    public function getParams()
    {
        $ret = [];
        foreach ($this->whereComponents as $whereComponent) {
            $ret = array_merge($ret, $whereComponent->getParams());
        }
        return $ret;
    }

}