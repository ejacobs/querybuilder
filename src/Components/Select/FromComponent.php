<?php

namespace Phion\Phequel\Components\Select;

use Phion\Phequel\AbstractExpression;
use Phion\Phequel\Format;

class FromComponent extends AbstractExpression
{
    /* @var string $table */
    private $table;

    /* @var null|string $alias */
    private $alias;

    /**
     * FromComponent constructor.
     * @param string $table
     * @param null|string $alias
     */
    public function __construct($table = null, $alias = null)
    {
        $this->table = $table;
        $this->alias = $alias;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->compose(true, [
            [Format::type_block_keyword, 'from'],
            [Format::type_table, [$this->table, $this->alias]],
            [Format::type_block_end]
        ]);
    }

}
