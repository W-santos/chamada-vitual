<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IFPB</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <script src="capture.js"> -->
    <link href="css/full-width-pics.css" rel="stylesheet">
    <script src="capture.js">
  	</script>



</head>

<body>



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
          <canvas id="canvas">
          </canvas>
        </div>
          <div class="output">

          </div>






          <?php
          	if (isset($_POST['image'])) {
          		echo $_POST['image'];
          	}
          ?>


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
