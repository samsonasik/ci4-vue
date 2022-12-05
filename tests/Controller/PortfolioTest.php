<?php

namespace Tests\Controller;

use App\Controllers\Portfolio;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

/**
 * @internal
 */
final class PortfolioTest extends CIUnitTestCase
{
    use ControllerTestTrait;

    public function testIndex()
    {
        $testResponse = $this->controller(Portfolio::class)
            ->execute('index');

        $this->assertTrue($testResponse->isOK());
        $this->assertTrue($testResponse->see('Keyword'));
    }
}
