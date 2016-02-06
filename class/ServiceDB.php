<?php

class ServiceDB
{

  //ATRIBUTOS
  private $db;
  private $classe;
  private $tabela;

  //METODO CONSTRUTOR
  public function __construct(\PDO $db, $classe)
  {
    $this->db = $db;
    $this->classe = $classe;
    $this->tabela = $classe->getTabela();
  }

  //METODOS CRUD
  public function listar ()
  {

    $query = "SELECT * FROM $this->tabela;";

    $stmt = $this->db->query($query);

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function inserir ()
  {

    $colunas = array_keys($this->classe->getValues());
    $values = $this->classe->getValues();

    $stringColunas = implode(", ", $colunas);
    $stringValues = ":";
    $stringValues .= implode(", :", $colunas);

    $query = "INSERT INTO $this->tabela ($stringColunas) VALUES ($stringValues);";

    $stmt = $this->db->prepare($query);

    foreach ($values as $coluna => $valor) {
      $stmt->bindValue(":".$coluna, $valor);
    }

    if ($stmt->execute()){
      return true;
    }

    return false;

  }

  public function alterar ()
  {

    $values = $this->classe->getValues();
    $id = array_shift($values);

    $set = "";

    foreach ($values as $key => $value) {
      $set .= " ".$key." = :".$key.",";
    }

    $size = strlen($set);
    $set = substr($set,0, $size-1);

    $query = "UPDATE $this->tabela SET $set WHERE id = :id;";

    $stmt = $this->db->prepare($query);
    foreach ($values as $coluna => $valor) {
      $stmt->bindValue(":".$coluna, $valor);
    }
    $stmt->bindValue(":id", $id);

    if ($stmt->execute()){
      return true;
    }

    return false;

  }

  public function deletar ()
  {
    $id = $this->classe->getId();

    $query = "DELETE FROM $this->tabela WHERE id = :id;";

    $stmt = $this->db->prepare($query);
    $stmt->bindValue(":id", $id);

    if ($stmt->execute()){
      return true;
    }

    return false;
  }

  public function find ()
  {

    $values = $this->classe->getValues();

    $where = "";

    foreach ($values as $key => $value) {
      $where .= " ".$key." = :".$key." AND";
    }

    $size = strlen($where);
    $where = substr($where,0, $size-4);

    $query = "SELECT * FROM $this->tabela WHERE $where;";

    $stmt = $this->db->prepare($query);

    foreach ($values as $coluna => $valor) {
      $stmt->bindValue(":".$coluna, $valor);
    }

    $stmt->execute();
    $row = $stmt->rowCount();

    if ($row == 1){
      return true;
    }

    return false;
  }

}
