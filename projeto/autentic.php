<?php

$username = $_POST['username'] ?? '';
$pass = $_POST['pass'] ?? '';


$dsn = 'mysql:host=127.0.0.1;dbname=chamada_virtual';
$user = 'root';
$senha = 'abc123';
$pdo = new PDO($dsn, $user, $senha);


$sql = 'select * from admin';
$result = $pdo->query($sql);
$result = $result->fetchAll(PDO::FETCH_ASSOC);
$result = json_encode($result);
$array = json_decode($result);

$correto = 0;

foreach($array as $json){

  if ($json->login == $username)
    if ($json->pass == $pass)
      $correto = 1;
}

if ($correto == 1)
  header('Location: /dweb/projeto/chamada.php');
else
  echo "Login e/ou Senhaincorreta";


  //

 ?>
