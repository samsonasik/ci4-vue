<?php

namespace Tests\Controller;

use App\Controllers\Portfolio;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

class PortfolioTest extends CIUnitTestCase
{
	use ControllerTestTrait;

	public function testIndex()
	{
		$result = $this->controller(Portfolio::class)
						->execute('index');

		$this->assertTrue($result->isOK());
		$this->assertTrue($result->see('Keyword'));
	}
}
