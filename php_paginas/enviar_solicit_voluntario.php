<?php

include ('../php_default/controle_login.php');

if (verificaLogin()) {
    $id_usuario = getId_usuario();
    $resposta_1 = $_POST['resposta_1'];
    $resposta_2 = $_POST['resposta_2'];
    $resposta_3 = $_POST['resposta_3'];
    $resposta_4 = $_POST['resposta_4'];
    $data_solicit = date('Y-m-d');

    if (getNivel_usuario() <= 1){
        if (!verificaJaSolicitou($id_usuario)) {
            mysqli_query($link, "insert into t_solicit_voluntario (id_usuario, resposta_1, resposta_2, resposta_3, resposta_4, data_solicit) "
                    . "values ('$id_usuario', '$resposta_1', '$resposta_2', '$resposta_3', '$resposta_4', '$data_solicit')");

            echo '<script>'
            . 'alert("Recebemos o seu pedido!\nSeus dados serão analisados e entraremos em contato com você em breve!\nObrigado pelo interesse!");'
            . 'window.location.replace("../paginas/voluntarios.php#proposta");'
            . '</script>';
        } else {
            echo '<script>'
            . 'alert("Você já fez um pedido para ser voluntário!\nEntraremos em contato com você em breve...\nPor favor, aguarde!");'
            . 'history.back();'
            . '</script>';
        }
    } else if (getNivel_usuario() == 2){
        echo '<script>'
        . 'alert("Você já é um voluntário!");'
        . 'history.back();'
        . '</script>';
    } else if (getNivel_usuario() >= 3){
        echo '<script>'
        . 'alert("Você é um administrador, não pode ser voluntário!");'
        . 'history.back();'
        . '</script>';
    }
} else {
    echo '<script>'
    . 'alert("Por favor! Faça o login para fazer uma solicitação!");'
    . 'history.back();'
    . '</script>';
}

function verificaJaSolicitou($id_usuario) {
    global $link;

    $querySolicitAnterior = "SELECT id_usuario FROM t_solicit_voluntario WHERE id_usuario = '$id_usuario' and status_aprovacao = 0";
    $resultSolicitAnterior = mysqli_query($link, $querySolicitAnterior);
    $numLinhasResult = mysqli_num_rows($resultSolicitAnterior);

    if ($numLinhasResult == 0) {
        return false;
    }
    return true;
}