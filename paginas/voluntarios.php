<?php include '../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Voluntários | Melhor Amigo</title>

        <!-- Bootstrap -->
        <link href="../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../css/voluntarios.css" />
        
        <?php
        if(verificaLogin()) {
            $querySolicitAnterior = "SELECT id_usuario FROM t_solicit_voluntario WHERE id_usuario = '".getId_usuario()."' and status_aprovacao = 0";
            $resultSolicitAnterior = mysqli_query($link, $querySolicitAnterior);
            $numLinhasResult = mysqli_num_rows($resultSolicitAnterior);

            if ($numLinhasResult == 0) {
                $jaSolicitou = false;
            } else {
                $jaSolicitou = true;
            }
        }
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
                        <strong>Gostaria de ser <a href='" . $linkVoluntarios . "'>voluntário</a>?</strong> Faça o <a href='" . $linkLogin . "'>Login</a> ou <a href='cadastro_usuario.php'>Cadastre-se</a> para tornar isso posível!
                    </div>";
                } else if (getNivel_usuario() == 1) {
                    echo
                    "<div class='alert fade in alertIn'>
                        <button type='button' class='close' data-dismiss='alert'>×</button>
                        <strong>Atenção padrinho!</strong> Ao se tornar voluntário, você deixará de ser padrinho!
                    </div>";
                } else if (getNivel_usuario() == 2) {
                    echo
                    "<div class='alert fade in alertIn'>
                        <button type='button' class='close' data-dismiss='alert'>×</button>
                        <strong>Você já é voluntário!</strong> Para mais detalhes acesse a <a href='$linkAreaVoluntario'>área do voluntário</a>!
                    </div>";
                }
                ?>

                <div class="cabecalho center">
                    <h2>Voluntários<br/><small>Sua ajuda será mais que bem-vinda!</small></h2>
                </div>

                <div class="center" id="info">
                    <p>Para ser um voluntário você precisa ser maior de 18 anos.</p>
                    <p>Ser um voluntário é concordar em ajudar em atividades gerais na ONG, dando preferência em atividades de seu ramo profissional ou ideal e, claro, dentro do seu horário de disponibilidade.</p>
                    <p>Como em toda empresa temos carência de profissionais em algumas áreas.</p>
                    <p>Toda ajuda será muito bem vinda, mas temos que ter certo controle. Para se tornar um voluntário, você terá que preencher o formulário abaixo. Após análise de suas informações, entraremos em contato com você.</p>
                </div>

                <div class="thumbnail mythumbnail" id="proposta">
                    <?php
                    if(verificaLogin()) {
                        if (getNivel_usuario() == 2) {
                            echo
                            "<div class='alert fade in alertIn'>
                                <button type='button' class='close' data-dismiss='alert'>×</button>
                                <strong>Obrigado!</strong> Você já é voluntário!
                            </div>";
                        } else if (getNivel_usuario() >= 3) {
                            echo
                            "<div class='alert fade in alertIn'>
                                <button type='button' class='close' data-dismiss='alert'>×</button>
                                <strong>Você é um administrador!</strong> Não pode ser voluntário!
                            </div>";
                        } else if ($jaSolicitou) {
                            echo
                            "<div class='alert fade in alertIn'>
                                <button type='button' class='close' data-dismiss='alert'>×</button>
                                <strong>Você tem um pedido para ser voluntário pendente!</strong><br/>
                                Após análise, entraremos em contato com você!
                            </div>";
                        }
                    }
                    ?>
                    <div class="caption center">
                        <h4>Quer ser voluntário?<br/><small>Preencha abaixo!</small></h4>
                        <form method="post" action="../php_paginas/enviar_solicit_voluntario.php" id="formVoluntario" class="center">
                            <label>Por que você tem interesse em fazer parte do nosso time?<br/>Conte-nos! Queremos te conhecer!</label>
                            <textarea class="input-block-level" name="resposta_1" rows="2" required></textarea>
                            <label>Como planeja dividir seu tempo conosco?<br/>Dias e horários disponíveis para as atividades da ONG</label>
                            <textarea class="input-block-level" name="resposta_2" rows="2" required></textarea>
                            <label>Qual a sua profissão?</label>
                            <input class="input-block-level" type="text" name="resposta_3" required>
                            <label>Você já teve ou tem cães? Fale-nos sobre ele(s)!</label>
                            <textarea class="input-block-level" name="resposta_4" rows="2"></textarea>
                            <p></p>
                            <?php
                            if (!verificaLogin() OR getNivel_usuario() >= 2 OR $jaSolicitou) {
                                echo "<p id='submitVol' class='btn disabled'>Enviar</p>";
                            } else {
                                echo "<button id='submitVol' type='submit' class='btn'>Enviar</button>";
                            }
                            ?>
                        </form>
                    </div>
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