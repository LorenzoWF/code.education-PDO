<?php

class Usuario
{

  //ATRIBUTOS
  private $tabela = 'usuarios';
  private $values = array();

  //SETTERS
  public function setLogin($login)
  {
    $this->values['login'] = $login;
  }

  public function setSenha($senha)
  {
    $this->values['senha'] = md5($senha);
  }

  //GETTERS
  public function getLogin()
  {
    return $this->values['login'];
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
