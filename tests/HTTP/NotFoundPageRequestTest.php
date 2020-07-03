<?php

namespace Tests\HTTP;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Test\FeatureTestCase;

class NotFoundPageRequestTest extends FeatureTestCase
{
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
