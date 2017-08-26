<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Chamada Virtual</title>

  <link href="css/bootstrap.min.css" rel="stylesheet">

  <link href="css/full-width-pics.css" rel="stylesheet">
</head>

<body>

  <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          Menu <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="cadastro.php"><b>Cadastro de Aluno</a>
      </div>
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav navbar-right">
          <li>
              <a href="chamada.php"><b>Chamada</b></a>
          </li>
          <li>
            <a href="listagem.php"><b>Listagem de Alunos</b></a>
          </li>
          <li>
              <a href="sobre.html"><b>Sobre</b></a>
          </li>
          <li>
              <a href="index.html"><b>Sair</b></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="image-bg-fluid-height">
    <img class="img-responsive img-center" src="img/ifpb-1.png" alt="">
  </header>
  <body background="img/background3.svg">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="container">
          </div>
        </div>
          <div class="col-sm-6">
           <div class="jumbotron">
              <h2 align="center"> <b> Cadastro de alunos: </b> </h2>
              <form name="sentMessage" id="contactForm" action="" method="POST" novalidate>
                <div class="row control-group">
                  <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>Nome</label>
                    <input type="text" class="form-control" placeholder="Nome" name="name" required data-validation-required-message="Digite seu nome."required>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="row control-group">
                  <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>Matrícula</label>
                    <input type="text" class="form-control" placeholder="Matrícula" name="matricula" required data-validation-required-message="Digite sua matrícula."required>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="row control-group">
                  <div class="form-group col-xs-12 floating-label-form-group controls">
                    <label>E-mail</label>
                    <input type="text" class="form-control" placeholder="E-mail" name="email" required data-validation-required-message="Digite seu e-mail."required>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <br>
                <div>
                  <h4>Selecione a pasta contendo as imagens </h4>
                  <input type="file" id="ctrl" webkitdirectory directory multiple/>
                  <br>
                  <div id="success"></div>
                    <div class="row">
                      <div class="form-group col-xs-12" align="center">
                        <button type="submit" class="btn btn-success btn-lg" >Cadastrar</button>
                      </div>
                    </div>
                </form>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="container">
              </div>
            </div>
        </div>
      </div>
</body>

<?php

  $name = $_POST['name'] ?? '';
  $matricula = $_POST['matricula'] ?? 1;
  $email = $_POST['email'] ?? '';
  if (isset($_POST['name'])) {
    if ($_POST['name'] != NULL){
      $dsn = 'mysql:host=127.0.0.1;dbname=chamada_virtual';
      $user = 'root';
      $senha = 'abc123';
      $pdo = new PDO($dsn, $user, $senha);
      $sql = "insert aluno (nome, matricula, email) values ('{$name}', {$matricula}, '{$email}');";
      $pdo->exec($sql);
    }
  }
?>


    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
