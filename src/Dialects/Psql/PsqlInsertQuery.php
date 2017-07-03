<?php

namespace Ejacobs\Phequel\Dialects\Psql;

use Ejacobs\Phequel\Components\Insert\ReturningComponent;
use Ejacobs\Phequel\Query\AbstractInsertQuery;

/**
 * Class PsqlInsertQuery
 * @package Ejacobs\Phequel\Dialects\Psql
 */
class PsqlInsertQuery extends AbstractInsertQuery
{

    /* @var ReturningComponent $returningComponent */
    protected $returningComponent;

    /**
     * PsqlInsertQuery constructor.
     * @param null|string $tableName
     */
    public function __construct($tableName = null)
    {
        $this->returningComponent = new ReturningComponent();
        parent::__construct($tableName);
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
        $formatter = $this->formatter();
        return (string)$this->insertComponent->injectFormatter($formatter)
            . (string)$this->tableComponent->injectFormatter($formatter)
            . (string)$this->rowComponent->injectFormatter($formatter)
            . (string)$this->returningComponent->injectFormatter($formatter);
    }

}