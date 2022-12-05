<?php

namespace Tests\Controller;

use App\Controllers\About;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

/**
 * @internal
 */
final class AboutTest extends CIUnitTestCase
{
    use ControllerTestTrait;

    public function testIndex()
    {
        $testResponse = $this->controller(About::class)
            ->execute('index');

        $this->assertTrue($testResponse->isOK());
        $this->assertTrue($testResponse->see('I\'m a web developer. My name is {{ $this.name }}'));
    }
}
