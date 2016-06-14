<?php

include ('../../php_default/controle_login.php');

if (verificaLogin()) {
    if (getNivel_usuario() < 3) {
        header("location: ../../index.php");
    } else {
        $id_cao = $_POST['id_cao'];
        $nome = $_POST['nome'];
        $genero = $_POST['genero'];
        $idade = $_POST['idade'];
        $porte = $_POST['porte'];
        $status_disponivel = $_POST['status'];

        if ($nome) {
            if ($idade) {
                if (isset($_POST['remove-foto'])) {
                    $src_imagem = 'img/caes/cao_0.png';
                    
                    mysqli_query($link, "update t_cao set src_imagem='$src_imagem' where id_cao='$id_cao'");
                } else if (isset($_FILES['foto']['name']) && $_FILES['foto']['error'] == 0) {
                    $arquivo_tmp = $_FILES['foto']['tmp_name'];
                    $nome_arquivo = $_FILES['foto']['name'];

                    $extensao = pathinfo($nome_arquivo, PATHINFO_EXTENSION); //Pega a extensão

                    $extensao = strtolower($extensao); //Converte a extensão para minúsculo
                    //Somente imagens, .jpg;.jpeg;.gif;.png
                    if (strstr('.jpg;.jpeg;.gif;.png', $extensao)) {
                        $novo_nome = uniqid(time()) . "." . $extensao; //Cria um nome único para esta imagem

                        $destino = '../../img/caes/caes_novos/' . $novo_nome; //Concatena a pasta com o nome
                        //Tenta mover o arquivo para o destino
                        if (@move_uploaded_file($arquivo_tmp, $destino)) {
                            $src_imagem = 'img/caes/caes_novos/' . $novo_nome;

                            mysqli_query($link, "update t_cao set src_imagem='$src_imagem' where id_cao='$id_cao'");
                        }
                    } else {
                        echo '<script>'
                        . 'alert("Você poderá enviar apenas arquivos .jpg .jpeg .gif ou .png");'
                        . 'history.back();'
                        . '</script>';
                    }
                }

                mysqli_query($link, "update t_cao set nome='$nome', genero='$genero', idade='$idade', porte='$porte', status_disponivel=b'$status_disponivel' where id_cao='$id_cao'");

                if ($status_disponivel == 0) {
                    mysqli_query($link, "update t_solicit_adocao set status_aprovacao=1 where id_cao='$id_cao' and status_aprovacao=0");

                    $resultado = mysqli_query($link, "select id_padrinho from t_padrinho where id_cao='$id_cao'");

                    while ($row = mysqli_fetch_assoc($resultado)) {
                        mysqli_query($link, "update t_usuario set nivel_usuario=0 where id_usuario='".$row['id_padrinho']."'");
                    }

                    mysqli_query($link, "delete from t_padrinho where id_cao='$id_cao'");
                }

                header("location: ../../paginas/admin/controle_caes.php?func=edit");
            } else {
                echo '<script>'
                . 'alert("Por favor, informe a idade do Cão!");'
                . 'history.back();'
                . '</script>';
            }
        } else {
            echo '<script>'
            . 'alert("Por favor, informe o nome do Cão!");'
            . 'history.back();'
            . '</script>';
        }
    }
} else {
    header("location: ../../paginas/login_usuario.php");
}