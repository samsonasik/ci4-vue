<?php

namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Portfolio extends ResourceController
{
    protected $format = 'json';

    public function index()
    {
        $data    = include ROOTPATH . '/data/portfolio.php';
        $keyword = (string) $this->request->getGet('keyword');

        if ($keyword !== '') {
            $data = array_filter($data, static fn ($value) => stripos((string) $value['title'], (string) $keyword) !== false
            || stripos((string) $value['link'], (string) $keyword) !== false);
        }

        return $this->respond($data);
    }

    // --------------------------------------------------------------------
}
