<?php

require_once '../../config/connect.php';
require_once '../../class/ServiceDB.php';
require_once '../../class/Aluno.php';

$id = $_POST['id'];

$aluno = new Aluno();
$crud = new ServiceDB($conn, $aluno);

$aluno->setId($id);

$resultado = $crud->deletar();

if ($resultado == true){
  header ('Location: ../../index.php');
} else {
  echo "Nao foi possivel deletar esse usuario, <a href='index.php'>volte</a> e tente novamente.";
}
