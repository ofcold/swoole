<?php

namespace Ofcold\HttpSwoole\Tests\Task;

use Mockery as m;
use Ofcold\HttpSwoole\Helpers\FW;
use Ofcold\HttpSwoole\Task\QueueFactory;
use Ofcold\HttpSwoole\Tests\TestCase;

class SwooleQueueTest extends TestCase
{
	public function testPushProperlyPushesJobOntoSwoole()
	{
		$server = $this->getServer();
		$queue = QueueFactory::make($server, FW::version());
		$server->shouldReceive('task')->once();
		$queue->push(new FakeJob);
	}

	protected function getServer()
	{
		$server = m::mock('server');
		$server->shouldReceive('on');
		$server->taskworker = false;
		$server->master_pid = -1;

		return $server;
	}
}


