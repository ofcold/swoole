<?php

namespace Ofcold\HttpSwoole\Tests\Table;

use Mockery as m;
use Swoole\Table;
use Ofcold\HttpSwoole\Table\SwooleTable;
use Ofcold\HttpSwoole\Tests\TestCase;

class TableTest extends TestCase
{
	public function testAdd()
	{
		$table = m::mock(Table::class);

		$swooleTable = new SwooleTable;
		$swooleTable->add($name = 'foo', $table);

		$this->assertSame($table, $swooleTable->get($name));
	}

	public function testGetAll()
	{
		$table = m::mock(Table::class);

		$swooleTable = new SwooleTable;
		$swooleTable->add($foo = 'foo', $table);
		$swooleTable->add($bar = 'bar', $table);

		$this->assertSame(2, count($swooleTable->getAll()));
		$this->assertSame($table, $swooleTable->getAll()[$foo]);
		$this->assertSame($table, $swooleTable->getAll()[$bar]);
	}

	public function testDynamicallyGet()
	{
		$table = m::mock(Table::class);

		$swooleTable = new SwooleTable;
		$swooleTable->add($foo = 'foo', $table);

		$this->assertSame($table, $swooleTable->$foo);
	}
}
