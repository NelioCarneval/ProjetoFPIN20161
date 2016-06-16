<?php include '../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">

        <!-- Bootstrap -->
        <link href="../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../css/ficha_cao.css" />

        <?php
        include('../php_default/registro_caes.php');

        if (isset($_GET['id'])) {
            $id_cao_atual = $_GET['id'];
        } else {
            header("location: lista_caes.php");
        }
        
        if(verificaLogin()) {
            $querySolicitAnterior = "SELECT id_adotante FROM t_solicit_adocao WHERE id_adotante = '".getId_usuario()."' and status_aprovacao = 0";
            $resultSolicitAnterior = mysqli_query($link, $querySolicitAnterior);
            $numLinhasResult = mysqli_num_rows($resultSolicitAnterior);

            if ($numLinhasResult == 0) {
                $jaSolicitou = false;
            } else {
                $jaSolicitou = true;
            }
        }
        ?>
        
        <title><?php echo getNome_cao($id_cao_atual) ?> | Melhor Amigo</title>
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
                <ul class="breadcrumb">
                    <li><a href="lista_caes.php">Lista de Cães</a> <span class="divider">/</span></li>
                    <li class="active"><?php echo getNome_cao($id_cao_atual); ?></li>
                    <?php
                    if (getNivel_usuario() >= 3) {
                        echo "<a href='admin/dados_cao.php?id=".getId_cao($id_cao_atual)."' class='pull-right' title='Editar'><i class='icon-pencil'></i></a>";
                    }
                    ?>
                </ul>

                <?php
                if (!verificaLogin()) {
                    echo
                    "<div class='alert alert-info fade in'>
                        <button type='button' class='close' data-dismiss='alert'>×</button>
                        <strong>Quer <a href='".$linkAdocao."'>adotar</a> ou <a href='".$linkApadrinhamento."'>apadrinhar</a> este cãozinho?</strong> Faça o <a href='login_usuario.php' target='_BLANK'>Login</a> ou <a href='cadastro_usuario.php' target='_BLANK'>Cadastre-se</a> para continuar!
                    </div>";
                }
                ?>

                <div class="row-fluid">
                    <ul class="thumbnails">
                        <li class="span4">
                            <div class="thumbnail mythumbnail" id="ficha-cao">
                                <img src="../<?php echo getSrc_imagem_cao($id_cao_atual); ?>" class="imgCao" alt="<?php echo getNome_cao($id_cao_atual); ?>" title="<?php echo getNome_cao($id_cao_atual); ?>">
                                <div class="caption center">
                                    <h3><?php echo getNome_cao($id_cao_atual); ?></h3>
                                    <?php
                                    if (getStatus_disponivel_cao($id_cao_atual)) {
                                        echo"<p class='center'><span class='label label-success'>ESTÁ DISPONÍVEL</span></p>";
                                    } else {
                                        echo"<p class='center'><span class='label label-important'>NÃO ESTÁ DISPONÍVEL</span></p>";
                                    }
                                    ?>
                                    <p><strong>Idade: <?php echo getIdade_cao($id_cao_atual); ?> Anos</strong></p>
                                    <p><strong>Gênero: <?php echo getGenero_cao($id_cao_atual); ?></strong></p>
                                    <p><strong>Porte <?php echo getPorte_cao($id_cao_atual); ?></strong></p>
                                </div>
                            </div>
                        </li>
                        <li class="span4">
                            <div class="thumbnail mythumbnail">
                                <?php
                                if(verificaLogin()) {
                                    if ($jaSolicitou) {
                                        echo
                                        "<div class='alert fade in alertIn'>
                                            <button type='button' class='close' data-dismiss='alert'>×</button>
                                            <strong>Você já solicitou uma adoção!</strong><br/>
                                            <small>Para + detalhes ou cancela-la <a href='".$linkAdocao."#pedidos'>clique aqui</a></small>
                                        </div>";
                                    }
                                }
                                ?>
                                <div class="caption center">
                                    <h4>Quer adotá-lo?<br/><small>Escreva-nos!</small></h4>
                                    <form action="../php_paginas/enviar_solicit_adocao.php" method="post" id="formAdotar">
                                        <input type="hidden" value="<?php echo $id_cao_atual; ?>" name="id_cao">
                                        <label>Fale sobre você! Por que tem interesse em adotar este cãozinho?</label>
                                        <textarea class="input-block-level" name="mensagem" rows="8" required></textarea>
                                        <?php
                                        if (!verificaLogin() OR ! getStatus_disponivel_cao($id_cao_atual) OR $jaSolicitou) {
                                            echo "<p id='submitAdo' class='btn disabled'>Adotar</p>";
                                        } else {
                                            echo "<button id='submitAdo' type='submit' class='btn'>Adotar</button>";
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </li>
                        <li class="span4">
                            <div class="thumbnail mythumbnail">
                                <?php
                                if (getNivel_usuario() == 1) {
                                    echo
                                    "<div class='alert fade in alertIn'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>Obrigado!</strong><br/>
                                        Você já é um padrinho!
                                    </div>";
                                } else if (getNivel_usuario() == 2) {
                                    echo
                                    "<div class='alert fade in alertIn'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>Você é um voluntário!</strong><br/>
                                        Sua ajuda já é de grande valor!
                                    </div>";
                                } else if (getNivel_usuario() >= 3) {
                                    echo
                                    "<div class='alert fade in alertIn'>
                                        <button type='button' class='close' data-dismiss='alert'>×</button>
                                        <strong>Você é um administrador!</strong><br/>
                                        Não precisa apadrinhar!
                                    </div>";
                                }
                                ?>
                                <div class="caption center">
                                    <h4>Quer apadrinha-lo?<br/><small>Preencha abaixo!</small></h4>
                                    <form action="../php_paginas/enviar_apadrinhamento.php" method="post" id="formApadrinhar">
                                        <input type="hidden" value="<?php echo $id_cao_atual; ?>" name="id_cao">
                                        <label>Valor Mensal:</label>
                                        <div class="input-prepend">
                                            <span class="add-on">R$</span>
                                            <input class="input-mini" type="text" name="valor_mensal" maxlength="7" placeholder="Ex: 50,00" required>
                                        </div>
                                        <label>Melhor dia de vencimento:</label>
                                        <div class="input-prepend">
                                            <span class="add-on">Dia</span>
                                            <input class="input-mini" type="text" name="dia_vencimento" maxlength="2" placeholder="1 à 30" required>
                                        </div>
                                        <label>Modo de recebimento de boleto:</label>
                                        <select class="input-medium" name="modo_boleto">
                                            <option value="Email">Email</option> 
                                            <option value="Correspondência">Correspondência</option> 
                                        </select>
                                        <p></p>
                                        <?php
                                        if (!verificaLogin() OR ! getStatus_disponivel_cao($id_cao_atual) OR getNivel_usuario() >= 1) {
                                            echo "<p id='submitPad' class='btn disabled'>Apadrinhar</p>";
                                        } else {
                                            echo "<button id='submitPad' type='submit' class='btn'>Apadrinhar</button>";
                                        }
                                        ?>
                                    </form>
                                </div>
                            </div>
                        </li>
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