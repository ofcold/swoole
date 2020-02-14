<?php

namespace Ofcold\HttpSwoole\Server\Resetters;

use Illuminate\Contracts\Container\Container;
use Ofcold\HttpSwoole\Server\Sandbox;

class ResetSession implements ResetterContract
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
		if (isset($app['session'])) {
			$session = $app->make('session');
			$session->flush();
			$session->regenerate();
		}

		return $app;
	}
}
