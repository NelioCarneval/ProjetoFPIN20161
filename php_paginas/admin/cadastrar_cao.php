<?php

include ('../../php_default/controle_login.php');

if (verificaLogin()) {
    if (getNivel_usuario() < 3) {
        header("location: ../../index.php");
    } else {
        $nome = $_POST['nome'];
        $genero = $_POST['genero'];
        $idade = $_POST['idade'];
        $porte = $_POST['porte'];

        if ($nome) {
            if ($idade) {
                if (isset($_FILES['foto']['name']) && $_FILES['foto']['error'] == 0) {
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
                        } else {
                            $src_imagem = 'img/caes/cao_0.png';
                        }
                    } else {
                        echo '<script>'
                        . 'alert("Você poderá enviar apenas arquivos .jpg .jpeg .gif ou .png");'
                        . 'history.back();'
                        . '</script>';
                    }
                } else {
                    $src_imagem = 'img/caes/cao_0.png';
                }

                mysqli_query($link, "insert into t_cao (nome, genero, idade, porte, src_imagem) "
                        . "values ('$nome', '$genero', '$idade', '$porte', '$src_imagem')");
                
                header("location: ../../paginas/admin/controle_caes.php?func=new");
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
