<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
  Efetua a busca dos dados no banco

*/

class Usuario_model extends CI_Model {

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

  public function registerJuridica($dados)
  {
    $this->db->insert('juridica', $dados);
  }

  public function registerFisica($dados)
  {
    $this->db->insert('fisica', $dados);
  }

  public function registerPhone($dados)
  {
    $this->db->insert('telefone', $dados);
  }

  public function registerUser($dados)
  {
    $this->db->insert('usuario', $dados);
  }

  public function registerEndereco($dados)
  {
    $this->db->insert('endereco', $dados);
  }

  public function getDadosFisica($idUser)
  {
    $this->db->select();
    $this->db->from('fisica');
    $this->db->where('usuario_idusuario',$idUser);

    $this->db->limit(1);

    $query=$this->db->get();

    if ($query->num_rows() == 1) {
      return $query->result();
    }else {
      return FALSE;
    }
  }
  public function getDadosJuridica($idUser)
  {
    $this->db->select();
    $this->db->from('juridica');
    $this->db->where('usuario_idusuario',$idUser);

    $this->db->limit(1);

    $query=$this->db->get();

    if ($query->num_rows() == 1) {
      return $query->result();
    }else {
      return FALSE;
    }
  }

  public function registerEnderecoFisica($dados)
  {
    $this->db->insert('enderecofisica', $dados);
  }
  public function registerEnderecoJuridica($dados)
  {
    $this->db->insert('enderecojuridica', $dados);
  }

  public function getEndereco($cep, $rua, $numero)
  {
    $this->db->select();
    $this->db->from('endereco');
    $this->db->where('cep',$cep);
    $this->db->where('rua',$rua);
    $this->db->where('numero',$numero);

    $this->db->limit(1);

    $query=$this->db->get();

    if ($query->num_rows() == 1) {
      return $query->result();
    }else {
      return FALSE;
    }
  }





}
