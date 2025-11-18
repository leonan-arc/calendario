<?php

@include 'conexao.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>pagina do usuario</title>

   <link rel="stylesheet" type="text/css" href="css/estilo2.css">

</head>
<body>
   
<div class="container">

   <div class="content">
      <h3>Olá, <span>usuario</span></h3>
      <h1>Seja bem vindo <span><?php echo $_SESSION['user_name'] ?></span></h1>
      <p>Essa é a pagina do usuario</p>
      <a href="login_form.php" class="btn">logar</a>
      <a href="register_form.php" class="btn">registrar</a>
      <a href="logout.php" class="btn">deslogar</a>
   </div>

</div>

</body>
</html>