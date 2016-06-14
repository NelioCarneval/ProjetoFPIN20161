<?php

include ('../php_default/controle_login.php');

if (verificaLogin()) {
    $id_padrinho = getId_usuario();
    $id_cao = $_POST['id_cao'];
    $valor_mensal = transformaValor($_POST['valor_mensal']);
    $dia_vencimento = $_POST['dia_vencimento'];
    $modo_boleto = $_POST['modo_boleto'];
    $data_apadrinhamento = date('Y-m-d');

    $nivel_usuario = getNivel_usuario();

    if ($nivel_usuario == 0) {
        if (verificaValor($valor_mensal)) {
            if (verificaDia($dia_vencimento)) {
                mysqli_query($link, "insert into t_padrinho (id_padrinho, id_cao, valor_mensal, dia_vencimento, modo_boleto, data_apadrinhamento) "
                        . "values ('$id_padrinho', '$id_cao', '$valor_mensal', '$dia_vencimento', '$modo_boleto', '$data_apadrinhamento')");

                mysqli_query($link, "UPDATE `t_usuario` SET `nivel_usuario` = '1' WHERE `t_usuario`.`id_usuario` = '$id_padrinho'");

                echo '<script>'
                . 'alert("Parabéns! Você agora é padrinho de um de nossos cãezinhos!\nObrigado!");'
                . 'window.location.replace("../paginas/lista_caes.php");'
                . '</script>';
            } else {
                echo '<script>'
                . 'alert("Por favor, insira um dia de vencimento válido!");'
                . 'history.back();'
                . '</script>';
            }
        } else {
            echo '<script>'
            . 'alert("Por favor, insira um valor mensal válido!");'
            . 'history.back();'
            . '</script>';
        }
    } else if ($nivel_usuario == 1) {
        echo '<script>'
        . 'alert("Você já é um padrinho!\nÉ possivel apadrinhar apenas um cãozinho!");'
        . 'history.back();'
        . '</script>';
    } else if ($nivel_usuario == 2) {
        echo '<script>'
        . 'alert("Você é um voluntário! Não precisa apadrinhar... Já nos ajuda bastante!\nObrigado!");'
        . 'history.back();'
        . '</script>';
    } else if ($nivel_usuario >= 3) {
        echo '<script>'
        . 'alert("Usuário Administrador! Você não precisa apadrinhar!");'
        . 'history.back();'
        . '</script>';
    }
} else {
    echo '<script>'
    . 'alert("Por favor! Faça o login para se tornar um padrinho!");'
    . 'history.back();'
    . '</script>';
}

function verificaValor($valor) {
    if ($valor > 0) {
        return true;
    }
    return false;
}

function verificaDia($dia) {
    if ($dia > 0 & $dia <= 30) {
        return true;
    }
    return false;
}

function transformaValor($valor_virgula) {
    $source = array('.', ',');
    $replace = array('.', '.');

    $valor_ponto = str_replace($source, $replace, $valor_virgula); //Remove os pontos e substitui a virgula pelo ponto
    return $valor_ponto; //Retorna o valor formatado para gravar no banco
}