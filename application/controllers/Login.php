<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model');
		$this->load->helper('url');
	}

	public function index()
	{

		$this->load->view('frontend/template/html-header');
		$this->load->view('frontend/template/header');
		$this->load->view('frontend/login');
		$this->load->view('frontend/template/footer');

	}

	public function autentica()
	{
		$this->load->model('Usuario_model');
		$this->load->library('form_validation');


		$this->form_validation->set_message('required', 'Campo %s obrigatório');
		$this->form_validation->set_rules('email', 'email', 'trim|required');
		$this->form_validation->set_rules('password', 'senha', 'trim|required|min_length[6]|max_length[16]|callback_checkDatabase');

		if ($this->form_validation->run()==FALSE) {

			$this->set_message();

			$this->load->view('template/html-header');
			$this->load->view('template/header');
			$this->load->view('frontend/login');
			$this->load->view('template/footer');
		}
		else {

			$email = $this->input->post('email');
			$senha = $this->input->post('password');

			//$senha = md5($this->input->post('password'));

			$resultadoUsuario = $this->Usuario_model->login($email, $senha);

		 foreach ($resultadoUsuario as $linha) {
			$dados['idUsuario'] = $linha->idusuario;
			$dados['nome'] = $linha->nome;
			$dados['email'] = $linha->email;
			$dados['idTipoUsuario'] = $linha->tipousuario_idtipousuario;
		 }

			$this->session->set_userdata('logged_in', $dados);

			if ($dados['idTipoUsuario'] == 1) {
				redirect('home_dashboard','refresh');
			}
			redirect('home','refresh');
		}
	}


	public function checkDatabase($senha)
	{

		$this->load->model('Usuario_model');
		$email = $this->input->post('email');
		$result = $this->Usuario_model->login($email, $senha);

		if ($result) {

			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	function set_message()
	{

	}
}

?>
