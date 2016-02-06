<?php

require 'config/connect.php';
require 'class/ServiceDB.php';
require 'class/Usuario.php';

$login = $_POST['login'];
$senha = $_POST['senha'];

$usuario = new Usuario();
$usuario->setLogin($login);
$usuario->setSenha($senha);

$crud = new ServiceDB($conn, $usuario);
$resultado = $crud->find();

if ($resultado == true){

  session_start();
  $_SESSION['login'] = 1;
  setcookie("login", "login", time() + 3600);

  header('Location: index.php');

} else {

  echo "VOCE NAO TEM ACESSO, CLIQUE NO LINK PARA <a href='index.php'>VOLTAR!</a>";


}
