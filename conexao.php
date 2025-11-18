<?php

    $usuario = 'root';
    $senha = '';
    $database = 'login';
    $host = 'localhost';    

    $mysqli = new mysqli($host, $usuario, $senha, $database);
    $conn = new mysqli($host, $usuario, $senha, $database);
    $conn = mysqli_connect("localhost", "root", "", "login");

    if ($mysqli->error) {
    	die("falha ao conectar no banco de dados:" . $mysqli->error);    	
    }

    if ($conn->connect_error) {
        die("Erro de conexão: " . $conn->connect_error);
    }

?>
