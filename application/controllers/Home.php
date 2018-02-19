<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->helper('form');

		$this->load->model('Produto_model', 'produto');
	  $this->produtos = $this->produto->getProdutos();

	}

	public function index()
	{

		$dados['produtos'] = $this->produtos;

		$this->load->view('frontend/template/html-header');
		$this->load->view('frontend/template/header', $dados);
		$this->load->view('frontend/home');
		$this->load->view('frontend/template/footer');
	}

	public function login()
	{
		redirect('login');
	}

	public function register()
	{
		redirect('Register/viewCadastro');
	}

	public function products()
	{
		$this->load->view('frontend/template/html-header');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/products');
		$this->load->view('frontend/template/footer');
	}
	public function about()
	{
		$this->load->view('frontend/template/html-header');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/about');
		$this->load->view('frontend/template/footer');
	}
	public function contact()
	{
		$this->load->view('frontend/template/html-header');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/contact');
		$this->load->view('frontend/template/footer');
	}
	public function details()
	{
		$this->load->view('frontend/template/html-header');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/details');
		$this->load->view('frontend/template/footer');
	}

	public function perfil()
	{
		$this->load->view('frontend/template/html-header');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/perfil');
		$this->load->view('frontend/template/footer');
	}

	public function simulador()
	{
		redirect('simulador');
	}


}
