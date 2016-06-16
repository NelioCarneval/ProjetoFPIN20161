<?php include '../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Doações | Melhor Amigo</title>

        <!-- Bootstrap -->
        <link href="../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../css/doacoes.css" />
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
                        <strong>Quer gerar um boleto diretamente do nosso site?</strong> Faça o <a href='login_usuario.php'>Login</a> ou <a href='cadastro_usuario.php'>Cadastre-se</a>!
                    </div>";
                }
                ?>

                <div class="cabecalho center">
                    <h2>Doações<br/><small>Ao doar, você ajuda nosso time a cuidar e tratar nossos amigos!</small></h2>
                </div>

                <p class="center"> Ao doar para a ONG Melhor Amigo, você contribui diretamente no bem estar, alimentação e cuidados de animais que estão em busca de um novo lar, antes sem esperança. Com isso você nos dá uma oportunidade de arcar com o custo operacional de nossos amiguinhos em um lar transitório. Contribua com qualquer valor.</p>

                <div class="well">
                    <form action="../php_paginas/gerar_boleto.php" target="_BLANK" method="post" class="form-inline center" id="formBoleto">
                        <p>Basta inserir o valor desejado para gerar um boleto, fácil e rápido!</p>
                        <input type="hidden" value="<?php echo getId_usuario(); ?>" name="id_usuario">
                        <div class="input-prepend">
                            <span class="add-on">R$</span>
                            <input class="input-small" type="text" placeholder="Ex: 50,00" name="valor" required>
                        </div>
                        <?php
                        if (!verificaLogin()) {
                            echo "<p class='btn disabled'>Gerar Boleto</p>";
                        } else {
                            echo "<button type='submit' class='btn'>Gerar Boleto</button>";
                        }
                        ?>
                    </form>
                </div>

                <div class="center">
                    <a href="https://pagseguro.uol.com.br/" target="_BLANK"><img src="../img/quero_doar.png" alt="doar-com-PagSeguro" title="Doar com PagSeguro"/></a>
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