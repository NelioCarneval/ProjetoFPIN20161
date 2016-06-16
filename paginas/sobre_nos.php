<?php include '../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Sobre Nós | Melhor Amigo</title>

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
                    <h2>Sobre Nós<br/><small>Uma trajetória de sonhos que realizamos para nossos melhores amigos!</small></h2>
                </div>

                <div class="center">
                    <img src="../img/imgs_site/img_6.jpg" class="img-polaroid" style="width: 30%; margin-bottom: 15px;">

                    <h3> Conheça um pouco mais sobre nós</h3>
                    <p>A superpopulação do Centro de Controle de Zoonoses não é mais uma possibilidade e sim um fato. 
                        A remediação para tal problema não é de agradar àqueles que se preocupam com o bem-estar destes animais, como por exemplo, o sacrifício.
                        Diante do extermínio e maus tratos desses, há a necessidade de utilizar tecnologias que auxiliem ONG’s destinadas a reduzir o sofrimento dos animais, 
                        além de levar alegria a novos lares.</p> 
                    <p>Somos uma organização não governamental sem fins lucrativos localizada em Maceió, que tem o intuito de remover os cães das ruas e 
                        retorná-los a uma vida digna, com a possibilidade de serem adotados por famílias que lhes deem amor.</p>
                    <p>Estamos funcionando há 3 anos e cerca de 300 cães tiveram sua história mudada através do nosso trabalho</p>                    
                    
                    <div id="integrantes" class="well" style="width: 60%; margin: auto; margin-bottom: 25px; margin-top: 25px;">
                        <h4>Integrantes da Equipe</h4>
                        <ul style="text-align: left;">
                            <li>Emmanuel Alves (emmanuel.sevla@gmail.com)</li>
                            <li>Felipe Carvalho (felipekstrue@gmail.com ou felipecavalcanti100@gmail.com)</li>
                            <li>Nélio Carneval (carnevalle18@gmail.com ou nelio_carneval@hotmail.com)</li>
                            <li>Pedro Ivo (pedroivo-hp@hotmail.com ou pedroivohp@gmail.com)</li>
                        </ul>
                    </div>
                    
                    <b>Curta-nos no Facebook: </b><button class="btn btn-primary"><i class=" icon-thumbs-up icon-white"></i> ONG Melhor Amigo</button>
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