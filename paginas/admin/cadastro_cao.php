<!DOCTYPE html>

<?php include '../../php_default/controle_login.php'; ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar lista de Cães | Melhor Amigo</title>

        <!-- Bootstrap -->
        <link href="../../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../../css/cadastro_usuario.css" />
        <link rel="stylesheet" type="text/css" href="../../css/admin/cadastro_editar_cao.css" />
    </head>
    <body>
        <div class="container mycontainer">
            <header>
                <?php
                $linkLogo = "../../img/logo_melhor_amigo_BLUE.png";
                $linkInicio = "../../index.php";
                $linkCaes = "../lista_caes.php";
                $linkAdocao = "../adocao.php";
                $linkApadrinhamento = "../apadrinhamento.php";
                $linkDoacoes = "../doacoes.php";
                $linkVoluntarios = "../voluntarios.php";
                $linkLogin = "../login_usuario.php";
                $linkCadastro = "../cadastro_usuario.php";
                $linkLogout = "../../php_default/deslogar_usuario.php";
                $linkMeusDados = "../meus_dados.php";

                if (verificaLogin()) {
                    if (getNivel_usuario() < 3) {
                        header("location: ../../index.php");
                    } else {
                        $linkControleCaes = "controle_caes.php";
                        $linkPedidosAdocao = "pedidos_adocao.php";
                        $linkPedidosVoluntario = "pedidos_voluntario.php";
                        $linkControleUsuarios = "controle_usuarios.php";
                    }
                } else {
                    header("location: ../login_usuario.php");
                }

                include('../../php_default/header_e_footer/header.php');
                ?>
            </header>

            <article>
                <ul class="breadcrumb">
                    <li><a href="controle_caes.php">Lista de Cães</a> <span class="divider">/</span></li>
                    <li class="active">Cadastrar Cão</li>
                </ul>
                
                <div class="thumbnail mythumbnail" id="formCao">
                    <div class="caption">
                        <fieldset>
                            <legend>Cadastrar Cão</legend>
                            <form action="../../php_paginas/admin/cadastrar_cao.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="campo">
                                    <label class="control-label">Nome:</label>
                                    <div class="controls">
                                        <input class="input-medium" type="text" name="nome" required>
                                    </div>
                                </div>
                                <div class="campo">
                                    <label class="control-label">Idade:</label>
                                    <div class="controls">
                                        <input class="input-mini" type="text" name="idade" maxlength="2" required>
                                    </div>
                                </div>
                                <div class="campo">
                                    <label class="control-label">Gênero:</label>
                                    <div class="controls">
                                        <select class="input-medium" name="genero">
                                            <option value="Macho">Macho</option> 
                                            <option value="Fêmea">Fêmea</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="campo">
                                    <label class="control-label">Porte:</label>
                                    <div class="controls">
                                        <select class="input-medium" name="porte">
                                            <option value="pequeno">Pequeno</option> 
                                            <option value="médio">Médio</option>
                                            <option value="grande">Grande</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="campo">
                                    <label class="control-label">Foto <small>(284x211)</small>:</label>
                                    <div class="controls">
                                        <input type="file" name="foto" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-actions btnAction">
                                    <button type="submit" class="btn">Cadastrar</button>
                                </div>
                            </form>
                        </fieldset>
                    </div>
                </div>
            </article>
                
             <footer>
                <?php
                $linkSobre = "../sobre_nos.php";
                $linkLocalizacao = "../localizacao.php";
                $linkDenuncie = "../denuncie.php";

                include('../../php_default/header_e_footer/footer.php');
                ?>
            </footer>
        </div>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="../../ferramentas_externas/bootstrap/js/bootstrap.js"></script>
    </body>
</html>