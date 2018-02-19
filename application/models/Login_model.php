<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
  Efetua a busca dos dados no banco

*/

class Login_model extends CI_Model {

  public $idUsuario;
  public $nome;
  public $email;
  public $senha;
  public $idTipoUsuario;

  public function login($email, $senha)
  {
    $this->db->select();
    $this->db->from('usuario');
    $this->db->where('email',$email);
    $this->db->where('senha',$senha);

    $this->db->limit(1);

    $query=$this->db->get();

    if ($query->num_rows() == 1) {
      return $query->result();
    }else {
      return FALSE;
    }

  }


}
