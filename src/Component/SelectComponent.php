<?php

namespace Ejacobs\QueryBuilder\Component;


class SelectComponent extends AbstractComponent
{
    protected $column;
    protected $alias;

    /**
     * SelectComponent constructor.
     * @param string $column
     * @param null $alias
     */
    public function __construct($column, $alias = null)
    {
        $this->column = $column;
        $this->alias = $alias;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $ret = $this->column;
        if ($this->alias) {
            $ret .= ' AS ' . $this->alias;
        }
        return $ret;
    }

}
