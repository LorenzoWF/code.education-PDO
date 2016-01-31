<?php

try {

  $config = parse_ini_file('config.ini');

  $driver = $config['driver'];
  $host = $config['host'];
  $port = $config['port'];
  $dbname = $config['dbname'];
  $user = $config['user'];
  $pass = $config['pass'];

  $conn = new \PDO($driver.':host='.$host.';port='.$port.';dbname='.$dbname, $user, $pass);

} catch (\PDOException $e){

  die("Erro Código: ".$e->getCode().":" .$e->getMessage());

}

$query = 'SELECT * FROM alunos';

$stmt = $conn->query($query);
$resultado = $stmt->fetchAll(PDO::FETCH_CLASS);

echo 'Todos os alunos:</br></br>';

foreach ($resultado as $aluno) {

  echo $aluno->nome.'    ';
  echo $aluno->nota.'</br>';

}

echo '</br>';


$query2 = 'select * from alunos ORDER BY nota DESC LIMIT 3;';

$stmt2 = $conn->query($query2);
$resultado2 = $stmt2->fetchAll(PDO::FETCH_CLASS);

echo 'Alunos com as 3 maiores notas:</br></br>';

  # code...
foreach ($resultado2 as $aluno2) {

  echo $aluno2->nome.'    ';
  echo $aluno2->nota.'</br>';

}
