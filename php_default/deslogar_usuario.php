<?php

session_start();

//var_dump($_SESSION);

unset($_SESSION['email_usuario'], $_SESSION['nome_usuario'], $_SESSION['id_usuario'], $_SESSION['nivel_usuario']);

$_SESSION['status_login'] = FALSE;

//var_dump($_SESSION);

header("location: ../index.php");