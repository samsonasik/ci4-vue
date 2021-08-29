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
        $result = $this->controller(Contact::class)
            ->execute('index');

        $this->assertTrue($result->isOK());
        $this->assertTrue($result->see('contact.'));
    }
}
