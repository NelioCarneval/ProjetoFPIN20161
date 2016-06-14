<?php

include ('../../php_default/controle_login.php');
include('../../php_default/registro_caes.php');

if (verificaLogin()) {
    if (getNivel_usuario() < 3) {
        header("location: ../../index.php");
    } else {
        $cod_solicit = $_GET['cod'];
        $resposta = $_GET['resp'];

        $queryPedido = "SELECT * FROM t_solicit_adocao where cod_solicit=$cod_solicit";
        $resultPedido = mysqli_query($link, $queryPedido);

        while ($row = mysqli_fetch_assoc($resultPedido)) {
            $id_cao = $row['id_cao'];
            $id_adotante = $row['id_adotante'];
        }

        if ($resposta == 's') {
            if (getStatus_disponivel_cao($id_cao)) {
                mysqli_query($link, "update t_solicit_adocao set status_aprovacao=2 where cod_solicit=$cod_solicit");
                mysqli_query($link, "update t_cao set status_disponivel=b'0' where id_cao='$id_cao'");

                $resultadoPadrinho = mysqli_query($link, "select id_padrinho from t_padrinho where id_cao='$id_cao'");

                while ($row = mysqli_fetch_assoc($resultadoPadrinho)) {
                    mysqli_query($link, "update t_usuario set nivel_usuario=0 where id_usuario='".$row['id_padrinho']."'");
                }
                
                mysqli_query($link, "delete from t_padrinho where id_cao='$id_cao'");
                
                header("location: ../../paginas/admin/pedidos_adocao.php?func=sim");
            }
        } else if ($resposta == 'n') {
            mysqli_query($link, "update t_solicit_adocao set status_aprovacao=1 where cod_solicit=$cod_solicit");
            
            header("location: ../../paginas/admin/pedidos_adocao.php?func=nao");
        }
    }
} else {
    header("location: ../../paginas/login_usuario.php");
}