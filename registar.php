<?php

@include 'conexao.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Usuario já existe!';

   }else{

      if($pass != $cpass){
         $error[] = 'password not matched!';
      }else{
         $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
         mysqli_query($conn, $insert);
         header('location:index.php');
      }
   }

};


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Formulário de cadastro</title>

   <link rel="stylesheet" href="css/estilo2.css">

</head>
<body>
   
<div class="form-container">

   <form action="index.php" method="post">
      <h3>Registar agora</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="name" required placeholder="coloque o seu nome">
      <input type="email" name="email" required placeholder="coloque o seu email">
      <input type="password" name="password" required placeholder="coloque a sua senha">
      <input type="password" name="cpassword" required placeholder="confimar sua senha">
      <select name="user_type">
         <option value="user">Usuario</option>
         <option value="admin">Admin</option>
      </select>
      <input type="submit" name="submit" value="registar agora" class="form-btn">
      <p>Já tem uma conta? <a href="login.php">Logar agora</a></p>
   </form>

</div>

</body>
</html>