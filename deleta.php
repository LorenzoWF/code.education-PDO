<?php

require_once 'connect.php';
require_once 'Aluno.php';

$id = $_POST['id'];

$aluno = new Aluno($conn);

$aluno->setId($id);

$resultado = $aluno->deletar();

if ($resultado == true){
  header ('Location: index.php');
} else {
  echo "Nao foi possivel deletar esse usuario, <a href='index.php'>volte</a> e tente novamente.";
}
