<?php

class Aluno
{

  //ATRIBUTOS
  private $db;
  private $id;
  private $nome;
  private $nota;

  //METODO CONSTRUTOR
  public function __construct(\PDO $db)
  {
    $this->db = $db;
  }

  //SETERS
  public function setId($id)
  {
    $this->id = $id;
  }

  public function setNome($nome)
  {
    $this->nome = $nome;
  }

  public function setNota($nota)
  {
    $this->nota = $nota;
  }

  //GETERS
  public function getId()
  {
    return $this->id;
  }

  public function getNome()
  {
    return $this->nome;
  }

  public function getNota()
  {
    return $this->nota;
  }

  //METODOS CRUD
  public function listar ()
  {
    $query = "SELECT * FROM alunos;";

    $stmt = $this->db->query($query);

    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

  public function inserir ()
  {
    $query = "INSERT INTO alunos (nome, nota) VALUES (:nome, :nota);";

    $stmt = $this->db->prepare($query);
    $stmt->bindValue(":nome", $this->nome);
    $stmt->bindValue(":nota", $this->nota);

    if ($stmt->execute()){
      return true;
    }

    return false;
  }

  public function alterar ()
  {
    $query = "UPDATE alunos SET nome = :nome, nota = :nota WHERE id = :id;";

    $stmt = $this->db->prepare($query);
    $stmt->bindValue(":nome", $this->nome);
    $stmt->bindValue(":nota", $this->nota);
    $stmt->bindValue(":id", $this->id);

    if ($stmt->execute()){
      return true;
    }

    return false;
  }

  public function deletar ()
  {
    $query = "DELETE FROM alunos WHERE id = :id;";

    $stmt = $this->db->prepare($query);
    $stmt->bindValue(":id", $this->id);

    if ($stmt->execute()){
      return true;
    }

    return false;
  }

}
