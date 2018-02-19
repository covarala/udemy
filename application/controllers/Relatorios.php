<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorios extends CI_Controller {


  public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Cliente_model');
	}

  public function index()
	{
		$this->load->view('backend/template/html-header');
		$this->load->view('backend/template/header');
	//	$this->load->view('backend/relatorios');
		$this->load->view('backend/template/footer');
	}



}
