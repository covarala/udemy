<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produto_model extends CI_Model {

  public $idproduto;
  public $descricao;
  public $valor;

	public function getProdutos()
  {

    $this->db->order_by('descricao','ASC');
    $query = $this->db->get('produto');
    return $query->result();
  }

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










/*  public function insert_entry()
{
$this->title    = $_POST['title']; // please read the below note
$this->content  = $_POST['content'];
$this->date     = time();

$this->db->insert('entries', $this);
}

public function update_entry()
{
$this->title    = $_POST['title'];
$this->content  = $_POST['content'];
$this->date     = time();

$this->db->update('entries', $this, array('id' => $_POST['id']));
}

}*/
