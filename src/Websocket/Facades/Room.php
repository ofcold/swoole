<?php

namespace Ofcold\HttpSwoole\Websocket\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static $this prepare()
 * @method static $this add($fd, $rooms)
 * @method static $this delete($fd, $rooms)
 * @method static array getClients($room)
 * @method static array getRooms($fd)
 *
 * @see \Ofcold\HttpSwoole\Websocket\Rooms\RoomContract
 */
class Room extends Facade
{
	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor()
	{
		return 'swoole.room';
	}
}
