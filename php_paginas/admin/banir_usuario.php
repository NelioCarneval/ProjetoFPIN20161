<?php

include ('../../php_default/controle_login.php');

if (verificaLogin()) {
    if (getNivel_usuario() < 3) {
        header("location: ../../index.php");
    } else {
        if (isset($_POST['id_usuario']) & isset($_POST['status_ban'])) {
            $id_usuario = $_POST['id_usuario'];
            $status_ban = $_POST['status_ban'];

            if ($status_ban == 0) {
                $novo_status = 1;
            } else {
                $novo_status = 0;
            }

            mysqli_query($link, "update t_usuario set status_ban=b'$novo_status' where id_usuario='$id_usuario'");

            header("location: ../../paginas/admin/dados_usuario_N.php?id=$id_usuario");
            
        } else if ((isset($_GET['id_usuario']) & isset($_GET['status_ban']))) {
            $id_usuario = $_GET['id_usuario'];
            $status_ban = $_GET['status_ban'];
            
            if ($status_ban == 0) {
                $novo_status = 1;
            } else {
                $novo_status = 0;
            }

            mysqli_query($link, "update t_usuario set status_ban=b'$novo_status' where id_usuario='$id_usuario'");

            if ($novo_status == 0) {
                header("location: ../../paginas/admin/controle_usuarios.php?func=noBan");
            } else if ($novo_status == 1) {
                header("location: ../../paginas/admin/controle_usuarios.php?func=ban");
            }
        }
    }
} else {
    header("location: ../../paginas/login_usuario.php");
}