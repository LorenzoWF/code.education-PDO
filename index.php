<?php

  if (isset($_COOKIE['login']) || isset($_SESSION['login'])){
    $estado = 1;
  } else{
    $estado = 0;
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Alunos</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

  </head>
  <body>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>

    <div class="container">

      <div class="row">
        <h1>CRUD</h1>
      </div>

      <div class="row">

        <div class="col-md-5">

          <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Listar Alunos
          </button>
          <div class="collapse" id="collapseExample">
            <div class="well">

              <?php

                require_once 'config/connect.php';
                require_once 'class/ServiceDB.php';
                require_once 'class/Aluno.php';

                $aluno = new Aluno();
                $crud = new ServiceDB($conn, $aluno);

                $x = 0;

                foreach ($crud->listar() as $c) {

                  ?>

                  <div class="row">
                    <div class="col-md-5">
                      <?php echo $c['nome']; ?>
                    </div>

                    <div class="col-md-3">

                    </div>

                    <?php if ($estado == 1){ ?>


                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $x; ?>">Alterar</button>

                      <div class="modal fade" id="exampleModal<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="exampleModalLabel"><?php echo $c['id']; ?></h4>
                            </div>
                              <div class="modal-body">
                                <form action="midd/Aluno/altera.php" method="post">
                                <div class="form-group">
                                  <input hidden type="hidden" class="form-control" id="id" name="id" value="<?php echo $c['id']; ?>">
                                  <label class="control-label">Nome:</label>
                                  <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $c['nome']; ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Nota:</label>
                                  <input type="number" class="form-control" id="nota" name="nota" value="<?php echo $c['nota']; ?>">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-success">Alterar</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                      <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2<?php echo $x; ?>">Deletar</button>

                      <div class="modal fade" id="exampleModal2<?php echo $x; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title" id="exampleModalLabel">Tem certeza que deseja deletar o aluno <?php echo $c['id']; ?> ?</h4>
                            </div>
                              <div class="modal-body">
                                <form action="midd/Aluno/deleta.php" method="post">
                                <div class="form-group">
                                  <input hidden type="hidden" class="form-control" id="id" name="id" value="<?php echo $c['id']; ?>">
                                  <label class="control-label">Nome:</label> <?php echo $c['nome']; ?>
                                  <input type="hidden" class="form-control" id="nome" name="nome" value="<?php echo $c['nome']; ?>">
                                </div>
                                <div class="form-group">
                                  <label class="control-label">Nota:</label> <?php echo $c['nota']; ?>
                                  <input type="hidden" class="form-control" id="nota" name="nota" value="<?php echo $c['nota']; ?>">
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                                <button type="submit" class="btn btn-danger">Deletar</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>

                    <?php } ?>

                  </div>

                  <?php

                  $x++;

                }

              ?>

        </div>
      </div>
    </div>

    <div class="col-md-4">

    </div>

    <?php if ($estado == 1){ ?>

    <div class="col-md-3">

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Cadastrar Aluno</button>
      <a href="logout.php" class="btn btn-default">Sair</a>

      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">Cadastrar Aluno</h4>
            </div>
              <div class="modal-body">
                <form action="midd/Aluno/insere.php" method="post">
                <div class="form-group">
                  <label class="control-label">Nome:</label>
                  <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="form-group">
                  <label class="control-label">Nota:</label>
                  <input type="number" class="form-control" id="nota" name="nota">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php } else { ?>

      <div class="col-md-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Login</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel">Login para gerenciar alunos</h4>
              </div>
                <div class="modal-body">
                  <form action="login.php" method="post">
                  <div class="form-group">
                    <label class="control-label">Login:</label>
                    <input type="text" class="form-control" id="login" name="login">
                  </div>
                  <div class="form-group">
                    <label class="control-label">Senha:</label>
                    <input type="password" class="form-control" id="senha" name="senha">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                  <button type="submit" class="btn btn-primary">Logar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>

    <?php } ?>

  </div>


    </div>

  </body>
</html>
