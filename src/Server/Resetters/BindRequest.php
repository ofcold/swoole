<?php

namespace Ofcold\HttpSwoole\Server\Resetters;

use Illuminate\Contracts\Container\Container;
use Illuminate\Http\Request;
use Ofcold\HttpSwoole\Server\Sandbox;

/**
 * Class BindRequest
 */
class BindRequest implements ResetterContract
{
	/**
	 * "handle" function for resetting app.
	 *
	 * @param \Illuminate\Contracts\Container\Container $app
	 * @param \Ofcold\HttpSwoole\Server\Sandbox $sandbox
	 *
	 * @return \Illuminate\Contracts\Container\Container
	 */
	public function handle(Container $app, Sandbox $sandbox)
	{
		$request = $sandbox->getRequest();

		if ($request instanceof Request) {
			$app->instance('request', $request);
		}

		return $app;
	}
}
