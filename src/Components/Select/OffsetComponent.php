<?php

namespace Phion\Phequel\Components\Select;

use Phion\Phequel\AbstractExpression;
use Phion\Phequel\Format;

class OffsetComponent extends AbstractExpression
{

    private $offset;

    /**
     * SelectComponent constructor.
     * @param int|null $offset
     */
    public function __construct($offset = null)
    {
        $this->offset = $offset;
    }

    /**
     * @return string
     */
    public function toString()
    {
        return $this->compose(!!$this->offset, [
            [Format::type_block_keyword, 'offset'],
            [Format::type_block_number, $this->offset],
            [Format::type_block_end]
        ]);
    }

}
