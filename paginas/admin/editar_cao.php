<!DOCTYPE html>

<?php include '../../php_default/controle_login.php'; ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Cão | Melhor Amigo</title>

        <!-- Bootstrap -->
        <link href="../../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../../css/cadastro_usuario.css" />
        <link rel="stylesheet" type="text/css" href="../../css/admin/cadastro_editar_cao.css" />

        <?php
        include('../../php_default/registro_caes.php');

        if (isset($_GET['id'])) {
            $id_cao_atual = $_GET['id'];
        } else {
            header("location: controle_caes.php");
        }

        if (strncasecmp('m', getGenero_cao($id_cao_atual), 1) == 0) {
            $selectMacho = "selected";
        } else if (strncasecmp('f', getGenero_cao($id_cao_atual), 1) == 0) {
            $selectFemea = "selected";
        }
        
        if (strncasecmp('p', getPorte_cao($id_cao_atual), 1) == 0) {
            $selectPequeno = "selected";
        } else if (strncasecmp('m', getPorte_cao($id_cao_atual), 1) == 0) {
            $selectMedio = "selected";
        } else if (strncasecmp('g', getPorte_cao($id_cao_atual), 1) == 0) {
            $selectGrande = "selected";
        }
        
        if (getStatus_disponivel_cao($id_cao_atual) == 0) {
            $selectNaoD = "selected";
        } else {
            $selectD = "selected";
        }
        ?>
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
                    <li class="active">Editar Cão</li>
                </ul>
                
                <a href="../ficha_cao.php?id=<?php echo getId_cao($id_cao_atual); ?>"><img src="../../<?php echo getSrc_imagem_cao($id_cao_atual); ?>" class="imgCaoEditar imgCao img-polaroid" alt="<?php echo getNome_cao($id_cao_atual); ?>" title="<?php echo getNome_cao($id_cao_atual); ?>"></a>

                <div class="thumbnail mythumbnail" id="formCao">
                    <?php
                    if (isset($selectD)) {
                        echo
                        "<div class='alert fade in' id='alertaEdit'>
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Atenção!</strong> Se mudar o status para NÃO DISPONÍVEL, os pedidos de adoção para este cão serão negados e os padrinhos dele deixarão de ser padrinhos.
                        </div>";
                    }
                    ?>
                    
                    <div class="caption">
                        <fieldset>
                            <legend>Editar Cão</legend>
                            <form action="../../php_paginas/admin/enviar_editar_cao.php" method="post" class="form-horizontal" enctype="multipart/form-data">
                                <input type="hidden" value="<?php echo $id_cao_atual; ?>" name="id_cao">
                                <div class="campo">
                                    <label class="control-label">Nome:</label>
                                    <div class="controls">
                                        <input class="input-medium" type="text" name="nome" value="<?php echo getNome_cao($id_cao_atual) ?>" required>
                                    </div>
                                </div>
                                <div class="campo">
                                    <label class="control-label">Idade:</label>
                                    <div class="controls">
                                        <input class="input-mini" type="text" name="idade" maxlength="2" value="<?php echo getIdade_cao($id_cao_atual) ?>" required>
                                    </div>
                                </div>
                                <div class="campo">
                                    <label class="control-label">Gênero:</label>
                                    <div class="controls">
                                        <select class="input-medium" name="genero">
                                            <option value="Macho" <?php echo isset($selectMacho) ? "$selectMacho" : ""; ?>>Macho</option> 
                                            <option value="Fêmea" <?php echo isset($selectFemea) ? "$selectFemea" : ""; ?>>Fêmea</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="campo">
                                    <label class="control-label">Porte:</label>
                                    <div class="controls">
                                        <select class="input-medium" name="porte">
                                            <option value="pequeno" <?php echo isset($selectPequeno) ? "$selectPequeno" : ""; ?>>Pequeno</option> 
                                            <option value="médio" <?php echo isset($selectMedio) ? "$selectMedio" : ""; ?>>Médio</option>
                                            <option value="grande" <?php echo isset($selectGrande) ? "$selectGrande" : ""; ?>>Grande</option> 
                                        </select>
                                    </div>
                                </div>
                                <div class="campo">
                                    <label class="control-label">Status:</label>
                                    <div class="controls">
                                        <select class="input-medium" name="status">
                                            <option value="1" <?php echo isset($selectD) ? "$selectD" : ""; ?>>Disponível</option> 
                                            <option value="0" <?php echo isset($selectNaoD) ? "$selectNaoD" : ""; ?>>Não Disponível</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="campo">
                                    <label class="control-label">Mudar Foto <small>(284x211)</small>:</label>
                                    <div class="controls">
                                        <input type="file" name="foto" accept="image/*">
                                    </div>
                                </div>
                                <div class="campo">
                                    <div class="controls">
                                        <input type="checkbox" name="remove-foto" value="foto" title="Selecione remover a foto deste cão"/> Remover foto
                                    </div>
                                </div>
                                <div class="form-actions btnAction">
                                    <button type="submit" class="btn">Salvar Alterações</button>
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