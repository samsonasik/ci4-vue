<?php

namespace Tests\HTTP;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class NotFoundPageRequestTest extends CIUnitTestCase
{
	use FeatureTestTrait;

	public function testLoad404Template()
	{
		$routes = [
			[
				'get',
				'404',
				'404::index',
			],
		];

		$this->expectException(PageNotFoundException::class);
		$this->withRoutes($routes)
			->get('404');
	}
}
