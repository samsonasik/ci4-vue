<?php

namespace Tests\Controller;

use App\Controllers\Home;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

class HomeTest extends CIUnitTestCase
{
	use ControllerTestTrait;

	public function testIndex()
	{
		$result = $this->controller(Home::class)
						->execute('index');

		$this->assertTrue($result->isOK());
		$this->assertTrue($result->see('home'));
	}
}
