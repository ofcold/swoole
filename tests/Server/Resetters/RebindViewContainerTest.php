<?php

namespace Ofcold\HttpSwoole\Tests\Server\Resetters;

use Mockery as m;
use Ofcold\HttpSwoole\Tests\TestCase;
use Ofcold\HttpSwoole\Server\Sandbox;
use Illuminate\Container\Container;
use Ofcold\HttpSwoole\Server\Resetters\RebindViewContainer;

class RebindViewContainerTest extends TestCase
{
	public function testRebindViewContainer()
	{
		$sandbox = m::mock(Sandbox::class);
		$view = m::mock('view');

		$container = new Container;
		$container->instance('view', $view);

		$resetter = new RebindViewContainer;
		$app = $resetter->handle($container, $sandbox);

		$this->assertSame($app, $app->make('view')->container);
		$this->assertSame($app, $app->make('view')->shared['app']);
	}
}
