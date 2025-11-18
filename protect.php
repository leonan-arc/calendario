<?php

if(!isset($_SESSION)) {
	session_start();
}

if (!isset($_SESSION['id'])) {
	 die(voce não pode acessar esta pagina por que não está logado.<p><A href=\"index.php\">Entrar</a></p>");
}

?>