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
        $result = $this->controller(About::class)
            ->execute('index');

        $this->assertTrue($result->isOK());
        $this->assertTrue($result->see('I\'m a web developer. My name is {{ $this.name }}'));
    }
}
