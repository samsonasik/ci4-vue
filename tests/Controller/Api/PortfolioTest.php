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
	}
}
