<!doctype html>
<html>
<head>
	<title>Projeto Dweb</title>
	<meta charset='utf-8'>
	<link rel="stylesheet" href="main.css" type="text/css" media="all">
	<script src="capture.js">
	</script>
</head>
<body>
<div class="contentarea">
	<h1>
		Captura de vídeo
	</h1>
  <div class="camera">
    <video id="video">Stream de vídeo indisponível.</video>
    <button id="startbutton">Tirar foto</button>
  </div>
  <canvas id="canvas">
  </canvas>
  <div class="output">
    <img id="photo" alt="A foto aparecerá nessa caixa.">
  </div>
	<p>
		<a href="https://developer.mozilla.org/en-US/docs/Web/API/WebRTC_API/Taking_still_photos"> Referência</a>
	</p>

	<!-- Substituit "__URL__" Pela pagina php de uploda de arquivo -->
	<form action="" method="post" >
    <input type="hidden" name="image" id="snapshot" value=""/>
    <input type="submit" value="Analisar" />
	</form>
</div>

<?php
	if (isset($_POST['image'])) {
		echo $_POST['image'];
	}
?>

</body>
</html>
