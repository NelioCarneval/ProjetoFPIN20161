<?php include '../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sobre Maus-tratos | Melhor Amigo</title>

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

                $linkControleCaes = "admin/editar_lista_caes.php";
                $linkPedidosAdocao = "admin/pedidos_adocao.php";
                $linkPedidosVoluntario = "admin/pedidos_voluntario.php";
                $linkControleUsuarios = "admin/controle_usuarios.php";

                $linkAreaPadrinho = "padrinho/area_padrinho.php";
                $linkAreaVoluntario = "voluntario/area_voluntario.php";

                include('../php_default/header_e_footer/header.php');
                ?>
            </header>

            <article>

                <div class="cabecalho center">
                    <h2>Maus-tratos é crime!<br/><small>Qualquer ato de maus-tratos envolvendo um animal deverá ser denunciado na Delegacia de Polícia. </small></h2>
                </div>
                
                <div class="center">
                    <img src="../img/imgs_site/img_3.jpg" class="img-polaroid" style="width: 35%; margin-bottom: 30px;">
                    <p>Aconselhamos que os casos de flagrante de maus-tratos e/ou que a vida de animais estejam em risco, acione a Polícia pelo 190 e aguarde no local até que a situação esteja regularizada. A Lei 9605/98 (Lei de Crimes Ambientais) prevê os maus-tratos como crime de comina as penas.</p>
                </div>
                
                <div id="integrantes" class="well" style="width: 55%; margin: auto; margin-bottom: 25px; margin-top: 25px;">
                    <p><b>O decreto 24645/34 (Decreto de Getúlio Vargas) determina quais atitudes podem ser consideradas como maus-tratos:</b></p>
                    <ul style="margin-left: 38px;">
                        <li>Abandonar, espancar, golpear, mutilar e envenenar;</li>
                        <li>Manter preso permanentemente em correntes;</li>
                        <li>Manter em locais pequenos e anti-higiênico;</li>
                        <li>Não abrigar do sol, da chuva e do frio;</li>
                        <li>Deixar sem ventilação ou luz solar;</li>
                        <li>Não dar água e comida diariamente;</li>
                        <li>Negar assistência veterinária ao animal doente ou ferido;</li>
                        <li>Obrigar a trabalho excessivo ou superior a sua força;</li>
                        <li>Capturar animais silvestres;</li>
                        <li>Utilizar animal em shows que possam lhe causar pânico ou estresse;</li>
                        <li>Promover violência como rinhas de galo, farra-do-boi etc</li>
                    </ul>
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