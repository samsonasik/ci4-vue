<?php

namespace Tests\unit\Filters;

use App\Filters\LayoutUsage;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use PHPUnit\Framework\TestCase;

class LayoutUsageTest extends TestCase
{
	private $filter;

	protected function setUp() : void
	{
		$this->filter = new LayoutUsage();
	}

	public function testBeforeOnIsAPI()
	{
		$request = $this->prophesize(IncomingRequest::class);
		$request->hasHeader('Accept')->willReturn(true);
		$request->getHeader('Accept')->willReturn(new class {
			public function getValue()
			{
				return 'application/json';
			}
		});
		$request->isAJAX()->willReturn(false);

		$this->assertNull($this->filter->before($request->reveal()));
	}

	public function testBeforeOnIsAjax()
	{
		$request = $this->prophesize(IncomingRequest::class);
		$request->hasHeader('Accept')->willReturn(true);
		$request->getHeader('Accept')->willReturn(new class {
			public function getValue()
			{
				return 'text/html';
			}
		});
		$request->isAJAX()->willReturn(true);

		$this->assertNull($this->filter->before($request->reveal()));
	}

	public function testAfter()
	{
		$filter = new LayoutUsage();

		$this->assertNull(
			$filter->after(
				$this->prophesize(RequestInterface::class)->reveal(),
				$this->prophesize(ResponseInterface::class)->reveal()
			)
		);
	}
}
