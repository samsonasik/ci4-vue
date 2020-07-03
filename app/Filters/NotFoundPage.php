<?php namespace App\Filters;

use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NotFoundPage implements FilterInterface
{
    public function before(RequestInterface $request)
    {
       if (! class_exists(service('router')->controllerName()))
       {
            throw new PageNotFoundException();
       }
    }

    public function after(RequestInterface $request, ResponseInterface $response)
    {
    }
}