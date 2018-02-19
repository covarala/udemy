<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('backend/template/html-header');
		$this->load->view('backend/template/header');
	//	$this->load->view('frontend/register');
		$this->load->view('backend/template/footer');
	}

	/*public function viewProduto()
	{
	  $escolha = $this->input->post('radio');


		if ($escolha == 2) {
			$this->load->view('template/html-header');
			$this->load->view('template/header');
			$this->load->view('frontend/register_juridica');
			$this->load->view('template/footer');
		}
		else {
			$this->load->view('template/html-header');
			$this->load->view('template/header');
			$this->load->view('frontend/register_fisica');
			$this->load->view('template/footer');
		}
	}*/


	public function cadastrarProdutoEstoque($idProduto, $qnt)
	{
		$this->load->model('Produto_model');

		$dadosEstoque = array(
			'idestoque' => $this->Produto_model->getIdEstoque($idProduto),
			'qnt' => $qnt,
			'produto_idproduto' => $idProduto,
		);
		$this->Produto_model->updateQnt($dadosEstoque);
	}
}
