<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class XMLHttpRequest implements FilterInterface
{
	public function before(RequestInterface $request)
	{
		$isAPI  = $request->hasHeader('Accept') && $request->getHeader('Accept')->getValue() === 'application/json';
		$isAjax = $request->isAJAX();

		if ($isAPI || $isAjax)
		{
			return;
		}

		return service('response')->setBody(view('layout'));
	}

	public function after(RequestInterface $request, ResponseInterface $response)
	{
	}
}
