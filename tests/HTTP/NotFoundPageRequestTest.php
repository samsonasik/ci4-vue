<?php

namespace Tests\HTTP;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\FeatureTestTrait;

/**
 * @internal
 */
final class NotFoundPageRequestTest extends CIUnitTestCase
{
    use FeatureTestTrait;

    public function testLoad404Template()
    {
        $this->expectException(PageNotFoundException::class);
        $this->call('get', '/404');
    }
}
