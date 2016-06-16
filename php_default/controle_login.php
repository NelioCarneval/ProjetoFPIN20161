<?php

session_start();

if (verificaLogin()) {
    include ('conexao_bd.php');

    $queryLogin = "SELECT * FROM t_usuario WHERE id_usuario = '" . getId_usuario() . "'";
    $resultLogin = mysqli_query($link, $queryLogin);

    while ($row = mysqli_fetch_assoc($resultLogin)) {
        $email = $row['email'];
        $id = $row['id_usuario'];
        $nome = $row['nome'];
        $nivel = $row['nivel_usuario'];
    }

    $_SESSION['email_usuario'] = $email;
    $_SESSION['id_usuario'] = $id;
    $_SESSION['nome_usuario'] = $nome;
    $_SESSION['nivel_usuario'] = $nivel;
}

function verificaLogin() {
    if (isset($_SESSION['status_login'])) {
        return $_SESSION['status_login'];
    }
    return false;
}

function getId_usuario() {
    if (isset($_SESSION['id_usuario'])) {
        return $_SESSION['id_usuario'];
    }
}

function getEmail_usuario() {
    if (isset($_SESSION['email_usuario'])) {
        return $_SESSION['email_usuario'];
    }
}

function getNivel_usuario() {
    if (isset($_SESSION['nivel_usuario'])) {
        return $_SESSION['nivel_usuario'];
    }
}

function getPrimeiroNome_usuario() {
    if (isset($_SESSION['nome_usuario'])) {
        $string = explode(" ", $_SESSION['nome_usuario']);
        return $string[0];
    }
}

function getNome_usuario() {
    if (isset($_SESSION['nome_usuario'])) {
        return $_SESSION['nome_usuario'];
    }
}

/*
var_dump(getEmail_usuario());
var_dump(getId_usuario());
var_dump(getNivel_usuario());
var_dump(getPrimeiroNome_usuario());
var_dump(getNome_usuario());
var_dump(verificaLogin());
*/