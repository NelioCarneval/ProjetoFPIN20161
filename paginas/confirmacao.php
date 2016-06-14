<!DOCTYPE html>

<?php include '../php_default/controle_login.php'; ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Confirmacao | Melhor Amigo</title>

        <!-- Bootstrap -->
        <link href="../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../css/layout_default.css" />
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
                $linkLogout = "../php_default/deslogar_usuario.php";
                $linkMeusDados = "meus_dados.php";

                $linkControleCaes = "admin/controle_caes.php";
                $linkPedidosAdocao = "admin/pedidos_adocao.php";
                $linkPedidosVoluntario = "admin/pedidos_voluntario.php";
                $linkControleUsuarios = "admin/controle_usuarios.php";

                $linkAreaPadrinho = "padrinho/area_padrinho.php";
                $linkAreaVoluntario = "voluntario/area_voluntario.php";

                if (!verificaLogin()) {
                    header("location: ../index.php");
                }

                include('../php_default/header_e_footer/header.php');
                ?>
            </header>

            <article>
                <?php
                if (isset($_GET['func'])) {
                    $func = $_GET['func'];
                    if ($func == 'noPadrinho') {
                        $pergunta = "Você tem certeza que deseja deixar de ser padrinho?";
                        $linkSim = "../php_paginas/padrinho/desistir_padrinho.php?resp=s";
                        $linkNao = "../php_paginas/padrinho/desistir_padrinho.php?resp=n";
                    } else if ($func == 'noVoluntario') {
                        $pergunta = "Você tem certeza que deseja deixar de ser voluntário?";
                        $linkSim = "../php_paginas/voluntario/desistir_voluntario.php?resp=s";
                        $linkNao = "../php_paginas/voluntario/desistir_voluntario.php?resp=n";
                    }
                }
                ?>

                <div class="well center" style="margin-bottom: 0;">
                    <legend><?php echo $pergunta; ?></legend>
                    <a href="<?php echo $linkSim; ?>" class="btn btn-success">Sim <i class="icon-ok icon-white"></i></a> <a href="<?php echo $linkNao; ?>" class="btn btn-danger">Não <i class="icon-remove icon-white"></i></a>
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

<?php
