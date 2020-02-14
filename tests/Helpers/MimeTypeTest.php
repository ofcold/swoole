<?php

namespace Ofcold\HttpSwoole\Tests\Helpers;

use Ofcold\HttpSwoole\Helpers\MimeType;
use PHPUnit\Framework\TestCase;

class MimeTypeTest extends TestCase
{
	public function testGet()
	{
		$extension = 'css';
		$mimetype = MimeType::get($extension);

		$this->assertEquals($mimetype, 'text/css');
	}

	public function testFrom()
	{
		$filename = 'test.css?id=12d123fadf';
		$mimetype = MimeType::from($filename);

		$this->assertEquals($mimetype, 'text/css');
	}
}
