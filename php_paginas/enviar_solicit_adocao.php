<?php

include ('../php_default/controle_login.php');

if (verificaLogin()) {
    $id_adotante = getId_usuario();
    $id_cao = $_POST['id_cao'];
    $mensagem = $_POST['mensagem'];
    $data_solicit = date('Y-m-d');

    if (!verificaJaSolicitou($id_adotante)) {
        mysqli_query($link, "insert into t_solicit_adocao (id_adotante, id_cao, mensagem, data_solicit) "
                . "values ('$id_adotante', '$id_cao', '$mensagem', '$data_solicit')");

        echo '<script>'
        . 'alert("Recebemos a sua mensagem!\nSeus dados serão analisados e entraremos em contato com você em breve!\nObrigado pelo interesse!");'
        . 'window.location.replace("../paginas/adocao.php#pedidos");'
        . '</script>';
    } else {
        echo '<script>'
        . 'alert("Você já tem uma solicitação de adoção pendente!\nEntraremos em contato com você em breve...\nPor favor, aguarde!");'
        . 'history.back();'
        . '</script>';
    }
} else {
    echo '<script>'
    . 'alert("Por favor! Faça o login para fazer uma solicitação de adoção!");'
    . 'history.back();'
    . '</script>';
}

function verificaJaSolicitou($id_adotante) {
    global $link;

    $querySolicitAnterior = "SELECT id_adotante, id_cao FROM t_solicit_adocao WHERE id_adotante = '$id_adotante' and status_aprovacao = 0";
    $resultSolicitAnterior = mysqli_query($link, $querySolicitAnterior);
    $numLinhasResult = mysqli_num_rows($resultSolicitAnterior);

    if ($numLinhasResult == 0) {
        return false;
    }
    return true;
}
