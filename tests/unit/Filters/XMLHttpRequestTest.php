<?php

namespace Tests\unit\Filters;

use App\Filters\XMLHttpRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use PHPUnit\Framework\TestCase;

class XMLHttpRequestTest extends TestCase
{
	public function testAfter()
	{
		$filter = new XMLHttpRequest();

		$this->assertNull(
			$filter->after(
				$this->prophesize(RequestInterface::class)->reveal(),
				$this->prophesize(ResponseInterface::class)->reveal()
			)
		);
	}
}
