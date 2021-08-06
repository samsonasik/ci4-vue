<?php

namespace Tests\HTTP;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

class NonAjaxRequestTest extends CIUnitTestCase
{
	use FeatureTestTrait;

	public function testRenderLayout()
	{
		$result = $this->call('get', '/');
		$this->assertRegExp('/<html>/', $result->getBody());
	}
}
