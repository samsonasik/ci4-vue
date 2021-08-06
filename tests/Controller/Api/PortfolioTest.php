<?php

namespace Tests\Controller\Api;

use App\Controllers\Api\Portfolio;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\ControllerTestTrait;

class PortfolioTest extends CIUnitTestCase
{
	use ControllerTestTrait;

	public function testIndex()
	{
		$result = $this->controller(Portfolio::class)
						->execute('index');

		$this->assertTrue($result->isOK());
		$this->assertTrue($result->see('website'));
	}

	public function provideTitle()
	{
		return [
			['Website B'],
			['site B'],
		];
	}

	/**
	 * @dataProvider provideTitle
	 */
	public function testIndexSearchPortfolioFoundByTitle($title)
	{
		$request = service('request');
		$request->setMethod('get');
		$request->setGlobal('get', [
			'keyword' => $title,
		]);

		$result = $this->withRequest($request)
					   ->controller(Portfolio::class)
					   ->execute('index');

		$this->assertTrue($result->see($title));
	}

	public function provideLink()
	{
		return [
			['https://www.website-b.com'],
			['www.website-b.com'],
		];
	}

	/**
	 * @dataProvider provideLink
	 */
	public function testIndexSearchPortfolioFoundByLink($link)
	{
		$request = service('request');
		$request->setMethod('get');
		$request->setGlobal('get', [
			'keyword' => $link,
		]);

		$result = $this->withRequest($request)
					   ->controller(Portfolio::class)
					   ->execute('index');

		$this->assertTrue($result->see($link));
	}

	public function provideEmptyKeyword()
	{
		return [
			[null],
			[''],
		];
	}

	/**
	 * @dataProvider provideEmptyKeyword
	 */
	public function testIndexSearchPortfolioEmptyKeywordShowAll($keyword)
	{
		$request = service('request');
		$request->setMethod('get');
		$request->setGlobal('get', [
			'keyword' => $keyword,
		]);

		$result = $this->withRequest($request)
					   ->controller(Portfolio::class)
					   ->execute('index');

		$this->assertTrue($result->see('website-a'));
		$this->assertTrue($result->see('website-b'));
		$this->assertTrue($result->see('website-c'));
	}

	public function testIndexSearchPortfolioNotFound()
	{
		$request = service('request');
		$request->setMethod('get');
		$request->setGlobal('get', [
			'keyword' => 'website-abcdef',
		]);

		$result = $this->withRequest($request)
					   ->controller(Portfolio::class)
					   ->execute('index');

		$this->assertFalse($result->see('website'));
	}
}
