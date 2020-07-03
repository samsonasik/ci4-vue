<?php namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

class Portfolio extends ResourceController
{
	protected $format = 'json';

	public function index()
	{
		$data    = include ROOTPATH . '/data/portfolio.php';
		$keyword = $this->request->getGet('keyword');

		if ($keyword)
		{
			$data = array_filter($data, function ($value) use ($keyword) {
				return (
					strpos(strtolower($value['title']), strtolower($keyword)) !== false
					||
					strpos(strtolower($value['link']), strtolower($keyword)) !== false
				);
			});
		}

		return $this->respond($data);
	}

	//--------------------------------------------------------------------

}
