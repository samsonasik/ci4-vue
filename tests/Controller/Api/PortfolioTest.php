<?php

namespace Tests\Controller\Api;

use App\Controllers\Api\Portfolio;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;

class PortfolioTest extends CIUnitTestCase
{
	use ControllerTester;

	public function testIndex()
	{
		$result = $this->controller(Portfolio::class)
						->execute('index');

		$this->assertTrue($result->isOK());
		$this->assertTrue($result->see('website'));
	}

	public function testIndexSearchPortfolioFound()
	{
		$request = service('request');
		$request->setMethod('get');
		$request->setGlobal('get', [
			'keyword' => 'website',
		]);

		$result = $this->withRequest($request)
					   ->controller(Portfolio::class)
					   ->execute('index');

		$this->assertTrue($result->see('website'));
	}

	public function testIndexSearchPortfolioNotFound()
	{
		$request = service('request');
		$request->setMethod('get');
		$request->setGlobal('get', [
			'keyword' => 'website-abcdef',
		]);

		$result = $this->withRequest($request)
					   ->controller(Portfolio::class)
					   ->execute('index');

		$this->assertFalse($result->see('website-abcdef'));
	}
}
