<?php

namespace Ofcold\HttpSwoole\Tests\Server\Resetters;

use Mockery as m;
use Ofcold\HttpSwoole\Tests\TestCase;
use Ofcold\HttpSwoole\Server\Sandbox;
use Illuminate\Container\Container;
use Symfony\Component\HttpFoundation\Cookie;
use Ofcold\HttpSwoole\Server\Resetters\ResetCookie;

class ResetCookieTest extends TestCase
{
	public function testResetCookie()
	{
		$cookie = m::mock(Cookie::class);
		$cookie->shouldReceive('getName')
			->once()
			->andReturn('foo');

		$cookies = m::mock('cookies');
		$cookies->shouldReceive('getQueuedCookies')
				->once()
				->andReturn([$cookie]);
		$cookies->shouldReceive('unqueue')
				->once()
				->with('foo');

		$sandbox = m::mock(Sandbox::class);

		$container = new Container;
		$container->instance('cookie', $cookies);

		$resetter = new ResetCookie;
		$app = $resetter->handle($container, $sandbox);
	}
}
