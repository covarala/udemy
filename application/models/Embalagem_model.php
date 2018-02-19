<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Embalagem_model extends CI_Model {

  public $idproduto;
  public $descricao;
  public $valor;

	
  public function getIdEstoque($idProduto)
  {
    $this->db->select();
    $this->db->from('estoque');
    $this->db->where('produto_idproduto', $idProduto);

    $query = $this->db->get();

    return $query->result();
  }

  public function updateQnt($dados)
  {
    $this->db->where('id', $dados['idestoque']);
    $this->db->update('estoque', $dados);
  }

}
