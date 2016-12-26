<?php

namespace spec\Ejacobs\QueryBuilder\Query\Postgres;

use Ejacobs\QueryBuilder\Query\Postgres\PostgresSelectQuery;
use PhpSpec\ObjectBehavior;

class PostgresSelectQuerySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->beConstructedWith('table_name');
        $this->shouldHaveType(PostgresSelectQuery::class);
    }

    function it_returns_valid_select_query()
    {
        $this->beConstructedWith('table_name');
        $this->shouldHaveType(PostgresSelectQuery::class);
        $this->select('*')->__toString()->shouldReturn('SELECT * FROM table_name;');
    }
}
