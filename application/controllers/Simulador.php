<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simulador extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		//$this->load->model('Cliente_model');
	}

	public function index()
	{
		$this->load->view('frontend/template/html-header');
		$this->load->view('frontend/template/header');
	//	$this->load->view('frontend/simulador');
		$this->load->view('frontend/template/footer');
	}

}
