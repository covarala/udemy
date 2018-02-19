<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
		$this->load->view('frontend/template/html-header');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/register');
		$this->load->view('frontend/template/footer');
	}

	public function viewCadastro()
	{
		$escolha = $this->input->post('radio');


		if ($escolha == 2) {
			$this->load->view('frontend/template/html-header');
			$this->load->view('frontend/template/header');
			$this->load->view('frontend/register_juridica');
			$this->load->view('frontend/template/footer');
		}
		else {
			$this->load->view('frontend/template/html-header');
			$this->load->view('frontend/template/header');
			$this->load->view('frontend/register_fisica');
			$this->load->view('frontend/template/footer');
		}
	}


	public function cadastrarFisica()
	{
		$this->load->model('Usuario_model');
			$dados = array(
				'nome' => $this->input->post('nome'),
				'email' => $this->input->post('email'),
				'senha' => $this->input->post('senha'),
				'confSenha' => $this->input->post('confSenha'),
				'cpf' => $this->input->post('cpf'),
				'nasc' => $this->input->post('nascimento'),
				'telefone' => $this->input->post('telefone'),
				'telefone1' => $this->input->post('telefone1'),
				'telefone2' => $this->input->post('telefone2'),
				'cep' => $this->input->post('cep'),
				'endereco' => $this->input->post('endereco'),
				'numEndereco' => $this->input->post('numEndereco'),
				'complemento' => $this->input->post('complemento'),
				'bairro' => $this->input->post('bairro'),
				'estado' => $this->input->post('estado'),
				'cidade' => $this->input->post('cidade'),
				'referencia' => $this->input->post('referencia'),
			);

			$dadosUser  = array(
				'nome' => $this->input->post('nome'),
				'email' => $this->input->post('email'),
				'senha' => $this->input->post('senha'),
				'tipousuario_idtipousuario' => 2,
			);
			$this->Usuario_model->registerUser($dadosUser);

			$result = $this->Usuario_model->login($dadosUser['email'], $dadosUser['senha']);
			foreach ($result as $linha) {
				$dadosUser['idUsuario'] = $linha->idusuario;
			}


			$dadosFisica = array(
				'cpf' => $this->input->post('cpf'),
				'nasc' => $this->input->post('nascimento'),
				'usuario_idusuario' => $dadosUser['idUsuario'],
			);
			$dadosFisica['nasc'] = date('Y-m-d', strtotime($dadosFisica['nasc']));

			$this->Usuario_model->registerFisica($dadosFisica);

			$dadosPhone = array(
				'telefone' => $this->input->post('telefone'),
				'usuario_idusuario' => $dadosUser['idUsuario'],
			);
			$this->Usuario_model->registerPhone($dadosPhone);

			if ($dados['telefone1'] != NULL) {
				$dadosPhone = array(
					'telefone' => $this->input->post('telefone1'),
					'usuario_idusuario' => $dadosUser['idUsuario'],
				);
				$this->Usuario_model->registerPhone($dadosPhone);
			}
			if ($dados['telefone2'] != NULL) {
				$dadosPhone = array(
					'telefone' => $this->input->post('telefone2'),
					'usuario_idusuario' => $dadosUser['idUsuario'],
				);
				$this->Usuario_model->registerPhone($dadosPhone);
			}

			$dadosEndereco = array(
				'cep' => $this->input->post('cep'),
				'rua' => $this->input->post('endereco'),
				'numero' => $this->input->post('numEndereco'),
				'complemento' => $this->input->post('complemento'),
				'bairro' => $this->input->post('bairro'),
				'estado' => $this->input->post('estado'),
				'cidade' => $this->input->post('cidade'),
				'pontoreferencia' => $this->input->post('referencia'),
			);
			$this->Usuario_model->registerEndereco($dadosEndereco);

			$result = $this->Usuario_model->getDadosFisica($dadosUser['idUsuario']);
			foreach ($result as $linha) {
				$dadosFisica['idFisica'] = $linha->idfisica;
			}

			$result = $this->Usuario_model->getEndereco($dadosEndereco['cep'], $dadosEndereco['rua'], $dadosEndereco['numero']);
			foreach ($result as $linha) {
				$dadosEndereco['idEndereco'] = $linha->idendereco;
			}

			$dadosEnderecoFisica = array(
				'endereco_idendereco' => $dadosEndereco['idEndereco'],
				'fisica_idfisica' => $dadosFisica['idFisica'],
			);

			$this->Usuario_model->registerEnderecoFisica($dadosEnderecoFisica);


	}

	public function cadastrarJuridica()
	{
		$this->load->model('Usuario_model');
			$dados = array(
				'nome' => $this->input->post('nome'),
				'email' => $this->input->post('email'),
				'senha' => $this->input->post('senha'),
				'confSenha' => $this->input->post('confSenha'),
				'cnpj' => $this->input->post('cnpj'),
				'inscEstadual' => $this->input->post('inscEstadual'),
				'telefone' => $this->input->post('telefone'),
				'telefone1' => $this->input->post('telefone1'),
				'telefone2' => $this->input->post('telefone2'),
				'cep' => $this->input->post('cep'),
				'endereco' => $this->input->post('endereco'),
				'numEndereco' => $this->input->post('numEndereco'),
				'complemento' => $this->input->post('complemento'),
				'bairro' => $this->input->post('bairro'),
				'estado' => $this->input->post('estado'),
				'cidade' => $this->input->post('cidade'),
				'referencia' => $this->input->post('referencia'),
			);

			$dadosUser  = array(
				'nome' => $this->input->post('nome'),
				'email' => $this->input->post('email'),
				'senha' => $this->input->post('senha'),
				'tipousuario_idtipousuario' => 3,
			);
			$this->Usuario_model->registerUser($dadosUser);

			$result = $this->Usuario_model->login($dadosUser['email'], $dadosUser['senha']);
			foreach ($result as $linha) {
				$dadosUser['idUsuario'] = $linha->idusuario;
			}


			$dadosJuridica = array(
				'cnpf' => $this->input->post('cnpj'),
				'inscricaoestadual' => $this->input->post('inscEstadual'),
				'usuario_idusuario' => $dadosUser['idUsuario'],
			);

			$this->Usuario_model->registerJuridica($dadosJuridica);

			$dadosPhone = array(
				'telefone' => $this->input->post('telefone'),
				'usuario_idusuario' => $dadosUser['idUsuario'],
			);
			$this->Usuario_model->registerPhone($dadosPhone);

			if ($dados['telefone1'] != NULL) {
				$dadosPhone = array(
					'telefone' => $this->input->post('telefone1'),
					'usuario_idusuario' => $dadosUser['idUsuario'],
				);
				$this->Usuario_model->registerPhone($dadosPhone);
			}
			if ($dados['telefone2'] != NULL) {
				$dadosPhone = array(
					'telefone' => $this->input->post('telefone2'),
					'usuario_idusuario' => $dadosUser['idUsuario'],
				);
				$this->Usuario_model->registerPhone($dadosPhone);
			}

			$dadosEndereco = array(
				'cep' => $this->input->post('cep'),
				'rua' => $this->input->post('endereco'),
				'numero' => $this->input->post('numEndereco'),
				'complemento' => $this->input->post('complemento'),
				'bairro' => $this->input->post('bairro'),
				'estado' => $this->input->post('estado'),
				'cidade' => $this->input->post('cidade'),
				'pontoreferencia' => $this->input->post('referencia'),
			);
			$this->Usuario_model->registerEndereco($dadosEndereco);

			$result = $this->Usuario_model->getDadosJuridica($dadosUser['idUsuario']);
			foreach ($result as $linha) {
				$dadosFisica['idJuridica'] = $linha->idjuridica;
			}

			$result = $this->Usuario_model->getEndereco($dadosEndereco['cep'], $dadosEndereco['rua'], $dadosEndereco['numero']);
			foreach ($result as $linha) {
				$dadosEndereco['idEndereco'] = $linha->idendereco;
			}

			$dadosEnderecoJuridica = array(
				'endereco_idendereco' => $dadosEndereco['idEndereco'],
				'juridica_idjuridica' => $dadosJuridica['idJuridica'],
			);

			$this->Usuario_model->registerEnderecoJuridica($dadosEnderecoJuridica);
		}

}
