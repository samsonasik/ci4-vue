<?php

namespace Tests\Controller\Api;

use App\Controllers\Api\Portfolio;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;
use PHPUnit\Framework\Attributes\DataProvider;

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
        $this->assertTrue($testResponse->see('website'));
    }

    public static function provideIndexSearchPortfolioFoundByTitle(): iterable
    {
        return [
            ['Website B'],
            ['site B'],
        ];
    }

    /**
     * @param mixed $title
     */
    #[DataProvider('provideIndexSearchPortfolioFoundByTitle')]
    public function testIndexSearchPortfolioFoundByTitle($title)
    {
        $request = service('request');
        $request->setMethod('get');
        $request->setGlobal('get', [
            'keyword' => $title,
        ]);

        $testResponse = $this->withRequest($request)
            ->controller(Portfolio::class)
            ->execute('index');

        $this->assertTrue($testResponse->see($title));
    }

    public static function provideIndexSearchPortfolioFoundByLink(): iterable
    {
        return [
            ['https://www.website-b.com'],
            ['www.website-b.com'],
        ];
    }

    /**
     * @param mixed $link
     */
    #[DataProvider('provideIndexSearchPortfolioFoundByLink')]
    public function testIndexSearchPortfolioFoundByLink($link)
    {
        $request = service('request');
        $request->setMethod('get');
        $request->setGlobal('get', [
            'keyword' => $link,
        ]);

        $testResponse = $this->withRequest($request)
            ->controller(Portfolio::class)
            ->execute('index');

        $this->assertTrue($testResponse->see($link));
    }

    public static function provideIndexSearchPortfolioEmptyKeywordShowAll(): iterable
    {
        return [
            [null],
            [''],
        ];
    }

    /**
     * @param mixed $keyword
     */
    #[DataProvider('provideIndexSearchPortfolioEmptyKeywordShowAll')]
    public function testIndexSearchPortfolioEmptyKeywordShowAll($keyword)
    {
        $request = service('request');
        $request->setMethod('get');
        $request->setGlobal('get', [
            'keyword' => $keyword,
        ]);

        $testResponse = $this->withRequest($request)
            ->controller(Portfolio::class)
            ->execute('index');

        $this->assertTrue($testResponse->see('website-a'));
        $this->assertTrue($testResponse->see('website-b'));
        $this->assertTrue($testResponse->see('website-c'));
    }

    public function testIndexSearchPortfolioNotFound()
    {
        $request = service('request');
        $request->setMethod('get');
        $request->setGlobal('get', [
            'keyword' => 'website-abcdef',
        ]);

        $testResponse = $this->withRequest($request)
            ->controller(Portfolio::class)
            ->execute('index');

        $this->assertFalse($testResponse->see('website'));
    }
}
