<?php

namespace Vultr\VultrPhp\Tests\Suite;

use Vultr\VultrPhp\VultrClient;

use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\Exception\RequestException;

use Vultr\VultrPhp\Tests\VultrTest;

class RegionsTest extends VultrTest
{
	public function testGetRegions()
	{
		$this->markTestSkipped('Not implemented');
	}
}
