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
            $data = array_filter($data, static function ($value) use ($keyword) {
                return
                    stripos($value['title'], $keyword) !== false
                    || stripos($value['link'], $keyword) !== false;
            });
        }

        return $this->respond($data);
    }

    //--------------------------------------------------------------------
}
