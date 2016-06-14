<!DOCTYPE html>

<?php include '../php_default/controle_login.php'; ?>

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
                <div class="cabecalho center">
                    <h2>Recuperar Senha<br/><small>Informe o email cadastrado para enviarmos um link de alteração de senha.</small></h2>
                </div>

                <form action="login_usuario.php" id="formLogin" class="form-horizontal" onSubmit='alert("Um email com um link para a recuperação da sua senha foi enviado!\nPor favor, siga os passos para recuperar a sua senha.")'>
                    <fieldset>
                        <div class="control-group">
                            <label class="control-label" for="inputEmail">Email</label>
                            <div class="controls">
                                <input type="text" id="inputEmail" placeholder="Email Cadastrado" name="email" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn">Enviar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>


                <div id="ajuda" class="center">
                    <p><a href="login_usuario.php">Faça o Login</a> | <a href="cadastro_usuario.php" target="_BLANK">Cadastre-se</a></p>
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

