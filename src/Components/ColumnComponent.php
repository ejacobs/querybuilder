<?php

namespace Ejacobs\Phequel\Components;

use Ejacobs\Phequel\AbstractExpression;

class ColumnComponent extends AbstractExpression
{
    /* @var string|null $column */
    private $column;

    /**
     * ColumnComponent constructor.
     * @param null|string $column
     */
    public function __construct($column = null)
    {
        $this->column = $column;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        if (!$this->column) {
            return '';
        }
        return $this->column;
    }

}