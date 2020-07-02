<?php

namespace Tests\Controller;

use App\Controllers\Home;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTester;

class HomeTest extends CIUnitTestCase
{
	use ControllerTester;

	public function testIndex()
	{
		$result = $this->controller(Home::class)
						->execute('index');

		$this->assertTrue($result->isOK());
		$this->assertTrue($result->see('home'));
	}
}
