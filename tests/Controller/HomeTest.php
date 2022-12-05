<?php

namespace Tests\Controller;

use App\Controllers\Home;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

/**
 * @internal
 */
final class HomeTest extends CIUnitTestCase
{
    use ControllerTestTrait;

    public function testIndex()
    {
        $testResponse = $this->controller(Home::class)
            ->execute('index');

        $this->assertTrue($testResponse->isOK());
        $this->assertTrue($testResponse->see('home'));
    }
}
