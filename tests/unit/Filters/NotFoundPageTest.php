<?php

namespace Tests\unit\Filters;

use App\Filters\NotFoundPage;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use PHPUnit\Framework\TestCase;

class NotFoundPageTest extends TestCase
{
	private $filter;

	protected function setUp() : void
	{
		$this->filter = new NotFoundPage();
	}

	public function testAfterOn404()
	{
		$this->assertNull(
			$this->filter->after(
				$this->prophesize(RequestInterface::class)->reveal(),
				$this->prophesize(ResponseInterface::class)->reveal()
			)
		);
	}
}
