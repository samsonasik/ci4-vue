<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class XMLHttpRequest implements FilterInterface
{
    public function before(RequestInterface $request)
    {
		$isAPI  = strpos($request->detectPath(), 'api') === 0;
		$isAjax = $request->hasHeader('X-Requested-With') && $request->getHeader('X-Requested-With')->getValue() === 'XMLHttpRequest';

		if ($isAPI || $isAjax)
		{
			return;
		}

		return service('response')->setBody(service('renderer')->render('layout'));
    }

    public function after(RequestInterface $request, ResponseInterface $response)
    {
    }
}