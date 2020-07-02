<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Config\Services;

class XMLHttpRequest implements FilterInterface
{
    public function before(RequestInterface $request)
    {
		$isAPI  = strpos($request->detectPath(), 'api') === 0;
		if ($isAPI)
		{
			return;
		}

		$isAjax = $request->hasHeader('X-Requested-With') && $request->getHeader('X-Requested-With')->getValue() === 'XMLHttpRequest';
		if ($isAjax)
		{
			return;
		}

		if (! $isAjax)
		{
			echo service('renderer')->render('layout');
			exit(0);
		}
    }

    public function after(RequestInterface $request, ResponseInterface $response)
    {
    }
}