<?php

namespace Ejacobs\Phequel\Dialects\Mysql;

use Ejacobs\Phequel\Components\Insert\ReturningComponent;
use Ejacobs\Phequel\Query\AbstractInsertQuery;

/**
 * Class MysqlInsertQuery
 * @package Ejacobs\Phequel\Dialects\Mysql
 */
class MysqlInsertQuery extends AbstractInsertQuery
{

    /* @var ReturningComponent $returningComponent */
    protected $returningComponent;

    /**
     * MysqlInsertQuery constructor.
     * @param array $rows
     */
    public function __construct(array $rows = [])
    {
        $this->returningComponent = new ReturningComponent();
        parent::__construct($rows);
    }

    /**
     * @param string $column
     * @param null|string $alias
     * @return $this
     */
    public function returning($column, $alias = null)
    {
        $this->returningComponent = new ReturningComponent($column, $alias);
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->compose(true, [
            $this->insertComponent,
            $this->rowsComponent,
            $this->returningComponent,
            $this->endingComponent
        ]);
    }

}