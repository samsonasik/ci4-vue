<?php

namespace Tests\HTTP;

use CodeIgniter\Test\FeatureTestCase;

class NonAjaxRequestTest extends FeatureTestCase
{
	public function testRenderLayout()
	{
		$routes = [
			[
				'get',
				'home',
				'Home::index',
			],
		];

		ob_start();
		$this->withRoutes($routes)
			->get('home');
		$layout = ob_get_clean();

		$this->assertRegExp('/<html>/', $layout);
	}
}
