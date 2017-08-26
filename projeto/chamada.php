<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chamada Virtual</title>

    <style >
      #tabela table {
        margin: 20px auto;
      }
      #tabela table thead tr {
        background: #aaaaaa;
        color: #fff;
      }

      #tabela table {
        border-collapse: collapse;
        text-align: center;
        width: 400px;
      }

    </style>

    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/full-width-pics.css" rel="stylesheet">
    <script src="capture.js">
  	</script>
</head>

<body>
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header page-scroll">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        Menu <i class="fa fa-bars"></i>
      </button>
      <a class="navbar-brand" href="chamada.php"><b>Chamada Virtual</b></a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="cadastro.php"><b>Casdastro de Aluno</b></a>
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

    <div class="contentarea">
    	<h3 align="center">
    		<b>Captura de vídeo</b>
    	</h3>
      <div class="camera" align="center">
        <video id="video">Stream de vídeo indisponível.</video>
        <br>
        <br>
        <button id="startbutton">Tirar foto</button>
        <br>
      </div>
      <br>
      <div align="center">
        <canvas id="canvas" style="display:none">
        </canvas>
        <div class="output">
          <img id="photo">
        </div>
        <br>
        <div>
          <form action="" method="post" id = "analisar">
            <input type="hidden" name="image" id="snapshot" value=""/>
            <input type="submit" value="Analisar" />
          </form>
          <br>
          <button id="resultado">Exibir resultado</button>
        </div>
      </div>
      <br>
      <div id="tabela" align="center">
      </div>
      <?php
      // print_r($_POST);
      if (isset($_POST['image'])) {
        // echo $_POST['image'];
        // Inserir aqui codigo php para opencv

        file_put_contents("data.txt", $_POST['image']);

        shell_exec("sudo python gerador.py");
        shell_exec("sudo ./main Teste.jpg");

        //  echo $_POST['image'] > "data.txt";

        //shell_exec($command);
      }
      ?>
  </div>
  </div>
</div>
</div>
</body>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
