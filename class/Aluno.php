<?php

class Aluno
{

  //ATRIBUTOS
  private $tabela = 'alunos';
  private $values = array();

  //SETERS
  public function setId($id)
  {
    $this->values['id'] = $id;
  }

  public function setNome($nome)
  {
    $this->values['nome'] = $nome;
  }

  public function setNota($nota)
  {
    $this->values['nota'] = $nota;
  }

  //GETERS
  public function getId()
  {
    return $this->values['id'];
  }

  public function getNome()
  {
    return $this->values['nome'];
  }

  public function getNota()
  {
    return $this->values['nota'];
  }

  public function getTabela()
  {
    return $this->tabela;
  }

  public function getValues ()
  {
    return ($this->values);
  }

}
