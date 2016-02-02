<?php

require_once 'connect.php';
require_once 'Aluno.php';

$nome = $_POST['nome'];
$nota = $_POST['nota'];

$aluno = new Aluno($conn);

$aluno->setNome($nome);
$aluno->setNota($nota);

$resultado = $aluno->inserir();

if ($resultado == true){
  header ('Location: index.php');
} else {
  echo "Nao foi possivel deletar esse usuario, <a href='index.php'>volte</a> e tente novamente.";
}
