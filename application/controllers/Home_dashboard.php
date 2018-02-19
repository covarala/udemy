<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home_dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->load->model('Produto_model', 'produtomodel');
		$this->produtos = $this->produtomodel->getProdutos();

	}

	public function index()
	{
		$dados['produtos'] = $this->produtos;

		$this->load->view('backend/template/html-header', $dados);
		$this->load->view('backend/template/header');
		$this->load->view('backend/home_dashboard');
		$this->load->view('backend/template/footer');
	}

	public function login()
	{
		redirect('login');
	}

	public function packaging()
	{
		redirect('embalagens');
	}

	public function clients()
	{
		redirect('clientes');
	}

	public function reports()
	{
		redirect('relatorios');
	}
}
