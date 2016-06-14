<?php

include ('../../php_default/controle_login.php');

if (getNivel_usuario() == 2) {
    if (isset($_GET['resp'])) {
        $resposta = $_GET['resp'];

        if ($resposta == 'n') {
            header("location: ../../paginas/voluntario/area_voluntario.php");
        } else if ($resposta == 's') {
            mysqli_query($link, "update t_usuario set nivel_usuario=0 where id_usuario='" . getId_usuario() . "'");
            mysqli_query($link, "delete from t_voluntario where id_voluntario='" . getId_usuario() . "'");

            echo '<script>'
            . 'alert("Obrigado pela ajuda que nos deu até hoje!\nEsperamos que volte futuramente!");'
            . 'window.location.replace("../../index.php");'
            . '</script>';
        }
    }
}