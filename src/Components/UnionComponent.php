<?php

namespace Phion\Phequel\Components;

use Phion\Phequel\AbstractExpression;
use Phion\Phequel\Format;

class UnionComponent extends AbstractExpression
{

    private $all;

    /**
     * UnionComponent constructor.
     * @param bool $all
     */
    public function __construct($all = false)
    {
        $this->all = $all;
    }

    /**
     * @return string
     */
    public function toString()
    {
        $keyword = 'union';
        if ($this->all) {
            $keyword .= ' all';
        }
        return $this->compose(true, [
            [Format::type_primary_keyword, $keyword],
            [Format::type_block_end]
        ]);
    }

}
