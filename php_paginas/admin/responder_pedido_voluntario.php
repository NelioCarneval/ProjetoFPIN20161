<?php

include ('../../php_default/controle_login.php');
include('../../php_default/registro_caes.php');

if (verificaLogin()) {
    if (getNivel_usuario() < 3) {
        header("location: ../../index.php");
    } else {
        $cod_solicit = $_GET['cod'];
        $resposta = $_GET['resp'];
        $data_admissao = date('Y-m-d');
        
        $queryPedido = "SELECT * FROM t_solicit_voluntario, t_usuario where t_solicit_voluntario.id_usuario=t_usuario.id_usuario AND cod_solicit=$cod_solicit";
        $resultPedido = mysqli_query($link, $queryPedido);

        while ($row = mysqli_fetch_assoc($resultPedido)) {
            $id_usuario = $row['id_usuario'];
            $nivel_usuario = $row['nivel_usuario'];
            $horario_disp = $row['resposta_2'];
        }
        
        if ($resposta == 's') {
            if ($nivel_usuario <= 2) {
                mysqli_query($link, "update t_solicit_voluntario set status_aprovacao=2 where cod_solicit=$cod_solicit");
                mysqli_query($link, "update t_usuario set nivel_usuario=2 where id_usuario=$id_usuario");
                mysqli_query($link, "delete from t_padrinho where id_padrinho=$id_usuario");
                mysqli_query($link, "insert into t_voluntario (id_voluntario, horario_disp, data_admissao) "
                        . "values ('$id_usuario', '$horario_disp', '$data_admissao')");
                
                header("location: ../../paginas/admin/pedidos_voluntario.php?func=sim");
            } else {
                mysqli_query($link, "update t_solicit_voluntario set status_aprovacao=1 where cod_solicit=$cod_solicit");
                
                header("location: ../../paginas/admin/pedidos_voluntario.php");
            }
        } else if ($resposta == 'n') {
            mysqli_query($link, "update t_solicit_voluntario set status_aprovacao=1 where cod_solicit=$cod_solicit");
            
            header("location: ../../paginas/admin/pedidos_voluntario.php?func=nao");
        }
    }
} else {
    header("location: ../../paginas/login_usuario.php");
}