<?php

include ('../php_default/controle_login.php');

if (verificaLogin()) {
    $id_usuario = $_POST['id_usuario'];
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $ncasa = $_POST['ncasa'];
    $bairro = $_POST['bairro'];
    $complemento = $_POST['complemento'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    
    if (verificaIdade($idade)){
        if (validaCEP($cep)) {
            $cep = dividirCEP($cep);
            
            mysqli_query($link, "update t_usuario set nome='$nome', idade='$idade', telefone='$telefone' where id_usuario='$id_usuario'");
            mysqli_query($link, "update t_endereco set cep='$cep', rua='$rua', ncasa='$ncasa', bairro='$bairro', complemento='$complemento', cidade='$cidade', estado='$estado' where id_usuario='$id_usuario'");
            
            header("location: ../paginas/meus_dados.php?func=edit");
        } else {
            echo "<script>"
            . "alert('Este CEP está incorreto!');"
            . "history.back();"
            . "</script>";
        }
    } else {
        echo "<script>"
        . "alert('Você precisa ter mais de 18 anos para se cadastrar!');"
        . "history.back();"
        . "</script>";
    }
} else {
    header("location: ../paginas/login_usuario.php");
}

function dividirCEP($cep) {
    if (strlen($cep) == 8) {
        $cepTemp = preg_split('//', $cep, -1, PREG_SPLIT_NO_EMPTY);
        $cepOK = "$cepTemp[0]$cepTemp[1]$cepTemp[2]$cepTemp[3]$cepTemp[4]-$cepTemp[5]$cepTemp[6]$cepTemp[7]";
        return $cepOK;
    }
    return $cep;
}

function verificaIdade($idade) {
    if ($idade >= 18) {
        return true;
    }
    return false;
}

function validaCEP($cep) {
    if (strlen($cep) != 8 & strlen($cep) != 9) {
        return false;
    }
    return true;
}