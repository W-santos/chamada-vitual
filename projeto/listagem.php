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
                <a class="navbar-brand" href="listagem.html"><b>Listagem de Alunos</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="chamada.php"><b>Chamada</b></a>
                    </li>
                    <li>
                        <a href="cadastro.php"><b>Cadastro de Alunos</b></a>
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
         <div id="tabela" align="center">
           <?php

                 echo "<table>";
                 echo '<thead> <th>Nome</th> <th>Matricula</th> <th>Email</th> </thead>';

                 $dsn = 'mysql:host=127.0.0.1;dbname=chamada_virtual';
                 $user = 'root';
                 $senha = 'abc123';
                 $pdo = new PDO($dsn, $user, $senha);


                 $sql = 'select * from aluno';
                 $result = $pdo->query($sql);
                 $result = $result->fetchAll(PDO::FETCH_ASSOC);
                 $result = json_encode($result);
                 $array = json_decode($result);
                //  /$array = json_decode($result, true); salvar como array

                 foreach($array as $json){
                   //echo $json['nome']; // you can access your key value like this if result is array
                  // echo $json->nome; // you can access your key value like this if result is object
                  echo "<tr> <td>{$json->nome}</td> <td>{$json->matricula}</td> <td>{$json->email}</td> </tr>";
                  // echo $line;
                }

                echo "</table>";
           ?>
         </div>
        </div>
    </div>
    <div class="col-sm-3">
      <div class="container">
          </div>
    </div>
  </div>
</div>
</body>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
