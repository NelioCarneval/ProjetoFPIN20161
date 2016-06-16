<?php

include ('../php_default/controle_login.php');

$id_usuario = $_POST['id_usuario'];
$senha_digitada = $_POST['senha'];
$nova_senha1 = $_POST['nova_senha1'];
$nova_senha2 = $_POST['nova_senha2'];

$querySenha = "SELECT senha FROM t_usuario WHERE id_usuario = '$id_usuario'";
$resultSenha = mysqli_query($link, $querySenha);

while ($row = mysqli_fetch_assoc($resultSenha)) {
    $senha = $row['senha'];
}

if (verificaSenha($senha_digitada)) {
    if (validaSenha($nova_senha1)) {
        if (verificaConfirmaSenha($nova_senha1, $nova_senha2)) {
            mysqli_query($link, "update t_usuario set senha='$nova_senha1' where id_usuario='$id_usuario'");
            
            header("location: ../paginas/meus_dados.php?func=senha");
        } else {
            echo "<script>"
            . "alert('A confirmação de senha está diferente da senha!');"
            . "history.back();"
            . "</script>";
        }
    } else {
        echo "<script>"
        . "alert('A nova senha deve conter no mínimo 8 caracteres!');"
        . "history.back();"
        . "</script>";
    }
} else {
    echo "<script>"
    . "alert('A senha atual está INCORRETA!');"
    . "history.back();"
    . "</script>";
}

function verificaSenha($senha_digitada) {
    global $senha;

    if ($senha == $senha_digitada) {
        return true;
    }
    return false;
}

function validaSenha($senha) {
    if (strlen($senha) < 8) {
        return false;
    }
    return true;
}

function verificaConfirmaSenha($senha1, $senha2) {
    if ($senha1 != $senha2) {
        return false;
    }
    return true;
}
