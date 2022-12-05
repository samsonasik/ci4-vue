<?php

namespace Tests\Controller;

use App\Controllers\Contact;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

/**
 * @internal
 */
final class ContactTest extends CIUnitTestCase
{
    use ControllerTestTrait;

    public function testIndex()
    {
        $testResponse = $this->controller(Contact::class)
            ->execute('index');

        $this->assertTrue($testResponse->isOK());
        $this->assertTrue($testResponse->see('contact.'));
    }
}
