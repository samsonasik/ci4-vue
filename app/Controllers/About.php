<?php namespace App\Controllers;

class About extends BaseController
{
	public function index()
	{
		return view('about', ['title' => 'About Me']);
	}

	//--------------------------------------------------------------------

}
