<?php

include ('../php_default/conexao_bd.php');

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$idade = $_POST['idade'];
$telefone = $_POST['telefone'];
$cep = $_POST['cep'];
$rua = $_POST['rua'];
$ncasa = $_POST['ncasa'];
$bairro = $_POST['bairro'];
$complemento = $_POST['complemento'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$email_digitado = $_POST['email'];
$senha1 = $_POST['senha1'];
$senha2 = $_POST['senha2'];

if (validaCPF($cpf)) {
    if (verificaIdade($idade)) {
        if (validaCEP($cep)) {
            if (verificaEmail($email_digitado)) {
                if (validaSenha($senha1)) {
                    if (verificaConfirmaSenha($senha1, $senha2)) {
                        $cpf = dividirCPF($cpf);
                        $cep = dividirCEP($cep);

                        mysqli_query($link, "insert into t_usuario (email, senha, nome, cpf, idade, telefone) "
                                . "values ('$email_digitado', '$senha1', '$nome', '$cpf', '$idade', '$telefone')");

                        $queryID = "SELECT id_usuario FROM t_usuario WHERE email = '$email_digitado'";
                        $resultID = mysqli_query($link, $queryID);

                        while ($row = mysqli_fetch_assoc($resultID)) {
                            global $id;
                            $id = $row['id_usuario'];
                        }

                        mysqli_query($link, "insert into t_endereco (id_usuario, cep, rua, ncasa, bairro, complemento, cidade, estado) "
                                . "values ('$id', '$cep', '$rua', '$ncasa', '$bairro', '$complemento', '$cidade', '$estado')");

                        header("location: ../paginas/login_usuario.php?cadastro=ok");
                    } else {
                        echo "<script>"
                        . "alert('A confirmação de senha está diferente da senha!');"
                        . "history.back();"
                        . "</script>";
                    }
                } else {
                    echo "<script>"
                    . "alert('A senha deve conter no mínimo 8 caracteres!');"
                    . "history.back();"
                    . "</script>";
                }
            } else {
                echo "<script>"
                . "alert('Este endereço de email já está sendo usado!');"
                . "history.back();"
                . "</script>";
            }
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
    echo "<script>"
    . "alert('Este número de CPF é inválido!');"
    . "history.back();"
    . "</script>";
}

function dividirCPF($cpf) {
    $cpfTemp = preg_split('//', $cpf, -1, PREG_SPLIT_NO_EMPTY);
    $cpfOK = "$cpfTemp[0]$cpfTemp[1]$cpfTemp[2].$cpfTemp[3]$cpfTemp[4]$cpfTemp[5].$cpfTemp[6]$cpfTemp[7]$cpfTemp[8]-$cpfTemp[9]$cpfTemp[10]";
    return $cpfOK;
}

function dividirCEP($cep) {
    $cepTemp = preg_split('//', $cep, -1, PREG_SPLIT_NO_EMPTY);
    $cepOK = "$cepTemp[0]$cepTemp[1]$cepTemp[2]$cepTemp[3]$cepTemp[4]-$cepTemp[5]$cepTemp[6]$cepTemp[7]";
    return $cepOK;
}

function validaCPF($cpf) {
    if (strlen($cpf) != 11) {
        return false;
    } else if ($cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
        return false;
    } else {
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf{$c} * (($t + 1) - $c);
            }

            $d = ((10 * $d) % 11) % 10;

            if ($cpf{$c} != $d) {
                return false;
            }
        }
        return true;
    }
}

function verificaIdade($idade) {
    if ($idade >= 18) {
        return true;
    }
    return false;
}

function validaCEP($cep) {
    if (strlen($cep) != 8) {
        return false;
    }
    return true;
}

function verificaEmail($email) {
    global $link;

    $queryVerificaEmail = "SELECT * FROM t_usuario WHERE email = '$email'";
    $resultVerificaEmail = mysqli_query($link, $queryVerificaEmail);
    $numLinhasResult = mysqli_num_rows($resultVerificaEmail);

    if ($numLinhasResult == 0) {
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
