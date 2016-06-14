<!DOCTYPE html>

<?php include '../php_default/controle_login.php'; ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cães | Melhor Amigo</title>
        
        <!-- Bootstrap -->
        <link href="../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../css/layout_default.css" />
        
        <?php include('../php_default/registro_caes.php'); ?>
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
                
                include('../php_default/header_e_footer/header.php');
                ?>
            </header>

            <article>
                <div class="cabecalho center">
                    <h2>Nossos Cãezinhos<br/><small>Todos estão disponíveis para <a href="adocao.php">adoção</a> e você também pode <a href="apadrinhamento.php">apadrinhar</a> um de nossos amiguinhos!</small></h2>
                </div>
                
                <div>
                    <?php
                    if($num_caes_disponiveis === 0){
                        echo "<h1 class='center'>FOI MAL!<br/><small>Estamos sem cães no momento...</small></h1>";
                    }
                    else{
                        if (isset($_GET['pag'])){
                            $num_pagina = $_GET['pag'];
                        }
                        else{
                            $num_pagina = 1;
                        }

                        $num = 1;

                        for($num_itens = 0; ($num_itens < (($num_pagina-1)*9)) && ($num_itens < $num_caes_disponiveis); $num++){
                            if(isset($cao[$num])){
                                if($cao[$num]["status_disponivel"] === TRUE){
                                    $num_itens++;
                                }
                            }
                        }
                       
                        
                        echo "
                            <div class='row-fluid'>
                                <ul class='thumbnails'>";
                        for($num_itens_pag = 0; ($num_itens < $num_caes_disponiveis) && ($num_itens_pag < 9); $num++){                            
                            if(isset($cao[$num])){
                                if($cao[$num]["status_disponivel"] === TRUE){
                                    echo "
                                        <li class='span4'>
                                            <a href='ficha_cao.php?id=".getId_cao($num)."'>
                                                <div class='thumbnail mythumbnail'>
                                                    <img src='../".getSrc_imagem_cao($num)."' class='imgCao' alt='".getNome_cao($num)."' title='".getNome_cao($num)."'>
                                                    <div class='caption'>
                                                        <h3 class='center'>".getNome_cao($num)."</h3>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>";

                                    $num_itens_pag++;
                                    $num_itens++;

                                    if($num_itens_pag % 3 === 0){
                                        echo "</ul><ul class='thumbnails'>";
                                    }
                                }
                            }
                        }
                        echo "</ul></div>";
                    }
                    ?>

                    <ul class="pager">
                        <?php
                        if($num_caes_disponiveis > 0){
                            if ($num_pagina != 1){
                                echo "<li><a href='lista_caes.php?pag=" . ($num_pagina-1) . "'>Anterior</a></li>";
                            }
                            if (($num_pagina*9) < $num_caes_disponiveis)
                            {
                                echo "<li><a href='lista_caes.php?pag=" . ($num_pagina+1) . "'>Próximo</a></li>";
                            }
                        }
                        ?>
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