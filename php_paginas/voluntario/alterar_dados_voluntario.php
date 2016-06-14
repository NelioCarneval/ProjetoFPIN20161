<?php

include ('../../php_default/controle_login.php');

if (verificaLogin()) {
    $id_voluntario = getId_usuario();
    $horario_disp = $_POST['horario_disp'];
    $agenda = $_POST['agenda'];

    if (getNivel_usuario() == 2) {
        mysqli_query($link, "update t_voluntario set horario_disp='$horario_disp', agenda='$agenda' where id_voluntario='$id_voluntario'");

        header("location: ../../paginas/voluntario/area_voluntario.php?func=edit");
    } else {
        echo '<script>'
        . 'alert("Você não é voluntário!");'
        . 'history.back();'
        . '</script>';
    }
} else {
    header("location: ../../paginas/login_usuario.php");
}