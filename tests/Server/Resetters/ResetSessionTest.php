<?php

namespace Ofcold\HttpSwoole\Tests\Server\Resetters;

use Mockery as m;
use Ofcold\HttpSwoole\Tests\TestCase;
use Ofcold\HttpSwoole\Server\Sandbox;
use Illuminate\Container\Container;
use Ofcold\HttpSwoole\Server\Resetters\ResetSession;

class ResetSessionTest extends TestCase
{
	public function testResetSession()
	{
		$session = m::mock('session');
		$session->shouldReceive('flush')
				->once();
		$session->shouldReceive('regenerate')
				->once();

		$sandbox = m::mock(Sandbox::class);

		$container = new Container;
		$container->instance('session', $session);

		$resetter = new ResetSession;
		$app = $resetter->handle($container, $sandbox);
	}
}
