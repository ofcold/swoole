<?php

namespace Ofcold\HttpSwoole\Tests\Server\Resetters;

use Mockery as m;
use Illuminate\Http\Request;
use Ofcold\HttpSwoole\Tests\TestCase;
use Ofcold\HttpSwoole\Server\Sandbox;
use Illuminate\Container\Container;
use Ofcold\HttpSwoole\Server\Resetters\BindRequest;

class BindRequestTest extends TestCase
{
	public function testBindRequest()
	{
		$request = m::mock(Request::class);

		$sandbox = m::mock(Sandbox::class);
		$sandbox->shouldReceive('getRequest')
				->once()
				->andReturn($request);

		$container = new Container;

		$resetter = new BindRequest;
		$app = $resetter->handle($container, $sandbox);

		$this->assertSame($request, $app->make('request'));
	}
}
