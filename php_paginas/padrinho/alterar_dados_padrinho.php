<?php

include ('../../php_default/controle_login.php');

if (verificaLogin()) {
    $id_padrinho = getId_usuario();
    $id_cao = $_POST['id_cao'];
    $valor_mensal = transformaValor($_POST['valor_mensal']);
    $dia_vencimento = $_POST['dia_vencimento'];
    $modo_boleto = $_POST['modo_boleto'];

    if (getNivel_usuario() == 1) {
        if (verificaValor($valor_mensal)) {
            if (verificaDia($dia_vencimento)) {
                mysqli_query($link, "update t_padrinho set id_cao='$id_cao', valor_mensal='$valor_mensal', dia_vencimento='$dia_vencimento', modo_boleto='$modo_boleto' where id_padrinho='$id_padrinho'");
                
                header("location: ../../paginas/padrinho/area_padrinho.php?func=edit");
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
    } else {
        echo '<script>'
        . 'alert("Você não é padrinho!");'
        . 'history.back();'
        . '</script>';
    }
} else {
    header("location: ../../paginas/login_usuario.php");
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
