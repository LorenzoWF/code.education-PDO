<?php

require_once 'connect.php';
require_once 'Aluno.php';

$id = $_POST['id'];
$nome = $_POST['nome'];
$nota = $_POST['nota'];

$aluno = new Aluno($conn);

$aluno->setId($id);
$aluno->setNome($nome);
$aluno->setNota($nota);

$resultado = $aluno->alterar();

if ($resultado == true){
  header ('Location: index.php');
} else {
  echo "Nao foi possivel alterar esse usuario, <a href='index.php'>volte</a> e tente novamente.";
}
