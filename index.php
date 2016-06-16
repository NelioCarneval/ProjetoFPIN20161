<?php include 'php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Melhor Amigo</title>

        <!-- Bootstrap -->
        <link href="ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="css/layout_default.css" />
    </head>
    <body>
        <div class="container mycontainer">
            <header>
                <?php
                $linkLogo = "img/logo_melhor_amigo_BLUE.png";
                $linkInicio = "index.php";
                $linkCaes = "paginas/lista_caes.php";
                $linkAdocao = "paginas/adocao.php";
                $linkApadrinhamento = "paginas/apadrinhamento.php";
                $linkDoacoes = "paginas/doacoes.php";
                $linkVoluntarios = "paginas/voluntarios.php";
                $linkLogin = "paginas/login_usuario.php";
                $linkCadastro = "paginas/cadastro_usuario.php";
                $linkLogout = "php_default/deslogar_usuario.php";
                $linkMeusDados = "paginas/meus_dados.php";

                $linkControleCaes = "paginas/admin/controle_caes.php";
                $linkPedidosAdocao = "paginas/admin/pedidos_adocao.php";
                $linkPedidosVoluntario = "paginas/admin/pedidos_voluntario.php";
                $linkControleUsuarios = "paginas/admin/controle_usuarios.php";

                $linkAreaPadrinho = "paginas/padrinho/area_padrinho.php";
                $linkAreaVoluntario = "paginas/voluntario/area_voluntario.php";

                include('php_default/header_e_footer/header.php');
                ?>
            </header>

            <article>
                <div id="myCarousel" class="carousel slide">
                    <!-- Itens de carousel -->
                    <div class="carousel-inner">
                        <div class="active item">
                            <a href="paginas/lista_caes.php"><img src="img/imgs_site/img_2.jpg" alt="..."></a>
                            <div class="carousel-caption">
                                <a href="paginas/lista_caes.php">
                                    <h4>Conheça nossos cãezinhos!</h4>
                                    <p>Aqui você pode conhecer todos os nossos amigos, pode também adotá-los ou apadrinhá-los!</p>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <a href="paginas/doacoes.php"><img src="img/imgs_site/img_12.jpg" alt="..."></a>
                            <div class="carousel-caption">
                                <a href="paginas/doacoes.php">
                                    <h4>Faça uma doação!</h4>
                                    <p>Ajude-nos a cuidar de nosso amigos!</p>
                                </a>
                            </div>
                        </div>
                        <div class="item">
                            <a href="paginas/denuncie.php"><img src="img/imgs_site/img_10.jpg" alt="..."></a>
                            <div class="carousel-caption">
                                <a href="paginas/denuncie.php">
                                    <h4>Denuncie maus-tratos, isso é crime!</h4>
                                    <p>Saiba mais aqui!</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Navegador do carousel -->
                    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
                </div>

                <blockquote>
                    <p>A grandeza de uma nação e seu progresso moral podem ser julgados pelo modo como seus animais são tratados.</p>
                    <small><cite title="Source Title">Mahatma Gandhi</cite></small>
                </blockquote>

                <div class="row-fluid">
                    <ul class="thumbnails">
                        <li class="span4">
                            <a href="paginas/adocao.php">
                                <div class="thumbnail mythumbnail">
                                    <img src="img/imgs_site/img_8.jpg" alt="">
                                    <div class="caption">
                                        <h3 class="center">Adote</h3>
                                        <p class="center">Dê um lar à um de nossos cãezinhos e ganhe um melhor amigo!</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="span4">
                            <a href="paginas/apadrinhamento.php">
                                <div class="thumbnail mythumbnail">
                                    <img src="img/imgs_site/img_1.jpg" alt="">
                                    <div class="caption">
                                        <h3 class="center">Apadrinhe</h3>
                                        <p class="center">Apadrinhe um de nossos cãezinhos e seja nosso parceiro!</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="span4">
                            <a href="paginas/doacoes.php">
                                <div class="thumbnail mythumbnail">
                                    <img src="img/imgs_site/img_9.jpg" alt="">
                                    <div class="caption">
                                        <h3 class="center">Doe</h3>
                                        <p class="center">Ajude-nos!<br/>Qualquer valor será bem vindo!</p>
                                    </div>                           
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </article>

            <footer>
                <?php
                $linkSobre = "paginas/sobre_nos.php";
                $linkLocalizacao = "paginas/localizacao.php";
                $linkDenuncie = "paginas/denuncie.php";

                include('php_default/header_e_footer/footer.php');
                ?>
            </footer>
        </div>

        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <script src="ferramentas_externas/bootstrap/js/bootstrap.js"></script>
    </body>
</html>