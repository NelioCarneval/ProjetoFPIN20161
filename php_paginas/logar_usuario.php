<?php

include ('../php_default/conexao_bd.php');

$email_digitado = $_POST['email'];
$senha_digitada = $_POST['senha'];

$queryCadastro = "SELECT * FROM t_usuario WHERE email = '$email_digitado'";
$resultCadastro = mysqli_query($link, $queryCadastro);

while ($row = mysqli_fetch_assoc($resultCadastro)) {
    $email = $row['email'];
    $senha = $row['senha'];
    $id = $row['id_usuario'];
    $nome = $row['nome'];
    $nivel = $row['nivel_usuario'];
    $status_ban = $row['status_ban'];
}

if (verificaCadastro($resultCadastro)) {
    if (verificaSenha($senha_digitada)) {
        if (!verificaBan($status_ban)) {

            iniciaSessao();
            header("location: ../index.php");
            
        } else {
            echo "<script>"
            . "alert('Este usuário encontra-se BANIDO por tempo indeterminado!');"
            . "history.back();"
            . "</script>";
        }
    } else {
        echo "<script>"
        . "alert('A senha está INCORRETA!');"
        . "history.back();"
        . "</script>";
    }
} else {
    echo "<script>"
    . "alert('Este endereço de email não está cadastrado!');"
    . "history.back();"
    . "</script>";
}

function verificaCadastro($resultCadastro) {
    $numLinhasResult = mysqli_num_rows($resultCadastro);

    if ($numLinhasResult > 0) {
        return true; //Existe cadastro
    }
    return false; //Não existe cadastro
}

function verificaSenha($senha_digitada) {
    global $senha;

    if ($senha == $senha_digitada) {
        return true;
    }
    return false;
}

function verificaBan($status_ban) {
    if ($status_ban == 0) {
        return false;
    }
    return true;
}

function iniciaSessao() {
    global $id, $email, $nome, $nivel;

    session_start();

    $_SESSION['email_usuario'] = $email;
    $_SESSION['id_usuario'] = $id;
    $_SESSION['nome_usuario'] = $nome;
    $_SESSION['nivel_usuario'] = $nivel;
    $_SESSION['status_login'] = TRUE;

    //echo $id . $email . $nome . $nivel;
    //var_dump($_SESSION);
}
