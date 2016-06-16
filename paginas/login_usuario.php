<?php include '../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Login | Melhor Amigo</title>
        
        <!-- Bootstrap -->
        <link href="../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../css/login_usuario.css">
    </head>
    <body>
        <div class="container mycontainer">
            <header>
                <?php
                $linkLogo = "../img/logo_melhor_amigo_BLUE.png";
                $linkInicio = "../index.php";
                $linkCaes = "lista_caes.php";
                $linkAdocao = "adocao.php";
                $linkApadrinhamento = "apadrinhamento.php";
                $linkDoacoes = "doacoes.php";
                $linkVoluntarios = "voluntarios.php";
                $linkLogin = "login_usuario.php";
                $linkCadastro = "cadastro_usuario.php";
                
                if(verificaLogin()){
                    header("location: ../index.php");
                }

                include('../php_default/header_e_footer/header.php');
                ?>
            </header>

            <article>
                <?php
                if (isset($_GET['cadastro'])) {
                    $cadastro = $_GET['cadastro'];
                    if ($cadastro == 'ok') {
                        echo "<div class='alert alert-success fade in'>"
                        . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                        . "<strong>Parabéns!</strong> Seu cadastro foi criado com sucesso!"
                        . "</div>";
                    }
                }
                ?>

                <div class="cabecalho center">
                    <h2>Login<br/><small>Seja bem-vindo! Faça o login abaixo.</small></h2>
                </div>

                <form action="../php_paginas/logar_usuario.php" method="post" id="formLogin" class="form-horizontal">
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Email</label>
                            <div class="controls">
                                <input type="text" id="inputEmail" placeholder="Email" name="email" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label" for="inputPassword">Senha</label>
                            <div class="controls">
                                <input type="password" id="inputPassword" placeholder="Senha" name="senha" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">Entrar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>


                <div id="ajuda" class="center">
                    <p><a href="esqueci_a_senha.php">Esqueci a senha</a> | <a href="cadastro_usuario.php" target="_BLANK">Cadastre-se</a></p>
                </div>
            </article>

            <footer>
                <?php
                $linkSobre = "sobre_nos.php";
                $linkLocalizacao = "localizacao.php";
                $linkDenuncie = "denuncie.php";

                include('../php_default/header_e_footer/footer.php');
                ?>
            </footer>
        </div>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="../ferramentas_externas/bootstrap/js/bootstrap.js"></script>
    </body>
</html>

