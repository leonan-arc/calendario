<?php

$conn = mysqli_connect('localhost','root','','user_db');

if (!$conn) {
   die("Erro na conexão: " . mysqli_connect_error());
}

?>