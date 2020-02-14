<?php

namespace Ofcold\HttpSwoole\Server\Resetters;

use Illuminate\Contracts\Container\Container;
use Ofcold\HttpSwoole\Server\Sandbox;

interface ResetterContract
{
	/**
	 * "handle" function for resetting app.
	 *
	 * @param \Illuminate\Contracts\Container\Container $app
	 * @param \Ofcold\HttpSwoole\Server\Sandbox $sandbox
	 */
	public function handle(Container $app, Sandbox $sandbox);
}
