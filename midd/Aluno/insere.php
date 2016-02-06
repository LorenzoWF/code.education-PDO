<?php

require_once '../../config/connect.php';
require_once '../../class/ServiceDB.php';
require_once '../../class/Aluno.php';

$nome = $_POST['nome'];
$nota = $_POST['nota'];

$aluno = new Aluno();
$crud = new ServiceDB($conn, $aluno);

$aluno->setNome($nome);
$aluno->setNota($nota);

$resultado = $crud->inserir();

if ($resultado == true){
  header ('Location: ../../index.php');
} else {
  echo "Nao foi possivel deletar esse usuario, <a href='index.php'>volte</a> e tente novamente.";
}
