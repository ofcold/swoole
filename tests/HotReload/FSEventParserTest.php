<?php

namespace Ofcold\HttpSwoole\Tests\HotReload;

use Carbon\Carbon;
use Ofcold\HttpSwoole\HotReload\FSEvent;
use Ofcold\HttpSwoole\HotReload\FSEventParser;
use Ofcold\HttpSwoole\Tests\TestCase;

/**
 * Class FSEventParserTest
 */
class FSEventParserTest extends TestCase
{
	public function testItCanCreateObjectAfterParse()
	{
		$buffer = 'Mon Dec 31 01:18:34 2018 /Some/Path/To/File/File.php Renamed OwnerModified IsFile';
		$event = FSEventParser::toEvent($buffer);

		$this->assertInstanceOf(FSEvent::class, $event);

		$this->assertTrue(array_diff($event->getTypes(), [FSEvent::Renamed, FSEvent::OwnerModified]) === []);
		$this->assertTrue((new Carbon('Mon Dec 31 01:18:34 2018'))->eq($event->getWhen()));
		$this->assertEquals('/Some/Path/To/File/File.php', $event->getPath());
		$this->assertTrue($event->isType(FSEvent::Renamed));
		$this->assertTrue($event->isType(FSEvent::OwnerModified));
	}
}
