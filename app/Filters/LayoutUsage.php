<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class LayoutUsage implements FilterInterface
{
	/**
	 * @param IncomingRequest $request
	 */
	public function before(RequestInterface $request, $arguments = null)
	{
		$isAPI  = $request->hasHeader('Accept') && $request->header('Accept')->getValue() === 'application/json';
		$isAjax = $request->isAJAX();

		// @codeCoverageIgnoreStart
		if ($isAPI || $isAjax)
		{
			return;
		}
		// @codeCoverageIgnoreEnd

		return service('response')->setBody(view('layout'));
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
	}
}
