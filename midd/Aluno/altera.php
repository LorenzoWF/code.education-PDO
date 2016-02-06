<?php

require '../../config/connect.php';
require '../../class/ServiceDB.php';
require '../../class/Aluno.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$nota = $_POST['nota'];

$aluno = new Aluno();
$crud = new ServiceDB($conn, $aluno);

$aluno->setId($id);
$aluno->setNome($nome);
$aluno->setNota($nota);

$resultado = $crud->alterar();

if ($resultado == true){
  header ('Location: ../../index.php');
} else {
  echo "Nao foi possivel alterar esse usuario, <a href='index.php'>volte</a> e tente novamente.";
}
