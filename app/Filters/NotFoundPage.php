<?php namespace App\Filters;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NotFoundPage implements FilterInterface
{
	public function before(RequestInterface $request, $arguments = null)
	{
		if (ENVIRONMENT !== 'development' && ! class_exists(service('router')->controllerName()))
		{
			throw PageNotFoundException::forPageNotFound('Page Not Found');
		}
	}

	public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
	{
	}
}
