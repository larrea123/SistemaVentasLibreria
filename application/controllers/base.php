<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Base extends CI_Controller {


	public function index()
	{
		$this->load->view('inicio');
	}

	public function prod()
	{
		$this->load-> view('productos');
	}

	public function cont()
	{
		$this->load-> view('contactos');
	}
}
