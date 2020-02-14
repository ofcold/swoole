<?php

namespace Ofcold\HttpSwoole\Concerns;

use Swoole\Table;
use Ofcold\HttpSwoole\Table\SwooleTable;

trait InteractsWithSwooleQueue
{
	/**
	 * Indicates if a packet is swoole's queue job.
	 *
	 * @param mixed
	 */
	protected function isSwooleQueuePacket($packet)
	{
		if (! is_string($packet)) {
			return false;
		}

		$decoded = json_decode($packet, true);

		return JSON_ERROR_NONE === json_last_error() && isset($decoded['job']);
	}
}
