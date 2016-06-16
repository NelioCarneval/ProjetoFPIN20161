<?php include '../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Apadrinhamento | Melhor Amigo</title>

        <!-- Bootstrap -->
        <link href="../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../css/layout_default.css" />

        <?php
        include('../php_default/registro_caes.php');
        include('../php_default/5_ids_fotosCaes.php');
        ?>
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
                <?php
                if (!verificaLogin()) {
                    echo
                    "<div class='alert alert-info fade in'>
                        <button type='button' class='close' data-dismiss='alert'>×</button>
                        <strong>Quer <a href='".$linkApadrinhamento."'>apadrinhar</a> um cãozinho?</strong> Faça o <a href='".$linkLogin."'>Login</a> ou <a href='cadastro_usuario.php'>Cadastre-se</a> para tornar isso possível!
                    </div>";
                } else if (getNivel_usuario() == 1) {
                    echo
                    "<div class='alert alert-info fade in alertIn'>
                        <button type='button' class='close' data-dismiss='alert'>×</button>
                        <strong>Você já é um padrinho!</strong> Para mais detalhes acesse a <a href='".$linkAreaPadrinho."'>área do padrinho</a>!
                    </div>";
                }
                ?>

                <div class="cabecalho center">
                    <h2>Apadrinhamento<br/><small>A sua ajuda é fundamental para que possamos mudar o destino de muitos animais.</small></h2>
                </div>

                <div class="center" id="info">
                    <p>O apadrinhamento é uma forma de conseguirmos recursos fixos para ajudar na tarefa diária de cuidar de nossos animais. Sendo assim você estará contribuindo diretamente para o seu bem estar e para que possamos fornecer o máximo de condições de saúde e oportunidade ao animal durante sua estadia conosco.</p>
                    <p>O apadrinhamento consiste no pagamento mensal de um determinado valor dentro das suas possibilidades e assim dividir conosco muitas de nossas despesas. Você receberá por e-mail ou correspondência um Boleto Bancário com o valor por você definido.</p>
                    <p>Após <a href="lista_caes.php" target="_BLANK">escolher um dos cãezinhos</a>, preencha a ficha de apadrinhamento. A partir daí você se torna nosso mais novo parceiro!</p>
                    <p><a href="lista_caes.php" target="_BLANK">Conheça nossos cãezinhos!</a></p>
                </div>
                
                <div id="fotosCaes" class="img-polaroid">    
                    <a href="lista_caes.php">
                        <img src="../<?php echo getSrc_imagem_cao($idFoto1); ?>" alt="nossos-cãezinhos" title="Nossos Cãezinhos"/><img src="../<?php echo getSrc_imagem_cao($idFoto2); ?>" alt="nossos-cãezinhos" title="Nossos Cãezinhos"/><img src="../<?php echo getSrc_imagem_cao($idFoto3); ?>" alt="nossos-cãezinhos" title="Nossos Cãezinhos"/><img src="../<?php echo getSrc_imagem_cao($idFoto4); ?>" alt="nossos-cãezinhos" title="Nossos Cãezinhos"/><img src="../<?php echo getSrc_imagem_cao($idFoto5); ?>" alt="nossos-cãezinhos" title="Nossos Cãezinhos"/>
                    </a>
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