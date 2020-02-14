<?php

return [
	/*
	|--------------------------------------------------------------------------
	| Websocket handler for onOpen and onClose callback
	| Replace this handler if you want to customize your websocket handler
	|--------------------------------------------------------------------------
	*/
	'handler' => Ofcold\HttpSwoole\Websocket\SocketIO\WebsocketHandler::class,

	/*
	|--------------------------------------------------------------------------
	| Default frame parser
	| Replace it if you want to customize your websocket payload
	|--------------------------------------------------------------------------
	*/
	'parser' => Ofcold\HttpSwoole\Websocket\SocketIO\SocketIOParser::class,

	/*
	|--------------------------------------------------------------------------
	| Websocket route file path
	|--------------------------------------------------------------------------
	*/
	'route_file' => base_path('routes/websocket.php'),

	/*
	|--------------------------------------------------------------------------
	| Default middleware for on connect request
	|--------------------------------------------------------------------------
	*/
	'middleware' => [
		// Ofcold\HttpSwoole\Websocket\Middleware\DecryptCookies::class,
		// Ofcold\HttpSwoole\Websocket\Middleware\StartSession::class,
		// Ofcold\HttpSwoole\Websocket\Middleware\Authenticate::class,
	],

	/*
	|--------------------------------------------------------------------------
	| Websocket handler for customized onHandShake callback
	|--------------------------------------------------------------------------
	*/
	'handshake' => [
		'enabled' => false,
		'handler' => Ofcold\HttpSwoole\Websocket\HandShakeHandler::class,
	],

	/*
	|--------------------------------------------------------------------------
	| Default websocket driver
	|--------------------------------------------------------------------------
	*/
	'default' => 'table',

	/*
	|--------------------------------------------------------------------------
	| Websocket client's heartbeat interval (ms)
	|--------------------------------------------------------------------------
	*/
	'ping_interval' => 25000,

	/*
	|--------------------------------------------------------------------------
	| Websocket client's heartbeat interval timeout (ms)
	|--------------------------------------------------------------------------
	*/
	'ping_timeout' => 60000,

	/*
	|--------------------------------------------------------------------------
	| Room drivers mapping
	|--------------------------------------------------------------------------
	*/
	'drivers' => [
		'table' => Ofcold\HttpSwoole\Websocket\Rooms\TableRoom::class,
		'redis' => Ofcold\HttpSwoole\Websocket\Rooms\RedisRoom::class,
	],

	/*
	|--------------------------------------------------------------------------
	| Room drivers settings
	|--------------------------------------------------------------------------
	*/
	'settings' => [

		'table' => [
			'room_rows' => 4096,
			'room_size' => 2048,
			'client_rows' => 8192,
			'client_size' => 2048,
		],
	],
];
