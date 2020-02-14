<?php

namespace Ofcold\HttpSwoole\Tests\HotReload;

use Swoole\Process;
use Ofcold\HttpSwoole\HotReload\FSProcess;
use Ofcold\HttpSwoole\Tests\TestCase;

/**
 * Class FSProcessTest
 */
class FSProcessTest extends TestCase
{
	public function testItCanCreateHotReloadProcess()
	{
		$process = new FSProcess('.php', true, __DIR__);

		$this->assertInstanceOf(FSProcess::class, $process);
		$this->assertInstanceOf(Process::class, $process->make());
	}

	public function testItCanCreateHotReloadProcessWithNeededConfiguration()
	{
		$process = new FSProcess('.php', true, __DIR__);
		$ref = new \ReflectionClass($process);
		$configure = $ref->getMethod('configure');
		$configure->setAccessible(true);
		$configuration = $configure->invoke($process);
		$sampleConfiguration = [
			'fswatch',
			'-rtx',
			'-e',
			'.*',
			'-i',
			"\\.php$",
			__DIR__,
		];

		$this->assertInstanceOf(FSProcess::class, $process);
		$this->assertInstanceOf(Process::class, $process->make());
		$this->assertTrue(
			array_diff($sampleConfiguration, $configuration) === []
		);
	}
}
