<!DOCTYPE html>

<?php include '../php_default/controle_login.php'; ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Meus Dados | Melhor Amigo</title>

        <!-- Bootstrap -->
        <link href="../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../css/cadastro_usuario.css" />

        <?php
        $id_usuario_N = getId_usuario();

        include ('../php_default/registro_usuario_N.php');

        if (getEstado_usuario_N() == "Acre") {
            $selectAC = "selected";
        } else if (getEstado_usuario_N() == "Alagoas") {
            $selectAL = "selected";
        } else if (getEstado_usuario_N() == "Amazonas") {
            $selectAM = "selected";
        } else if (getEstado_usuario_N() == "Amapá") {
            $selectAP = "selected";
        } else if (getEstado_usuario_N() == "Bahia") {
            $selectBA = "selected";
        } else if (getEstado_usuario_N() == "Ceará") {
            $selectCE = "selected";
        } else if (getEstado_usuario_N() == "Distrito Federal") {
            $selectDF = "selected";
        } else if (getEstado_usuario_N() == "Espírito Santo") {
            $selectES = "selected";
        } else if (getEstado_usuario_N() == "Goiás") {
            $selectGO = "selected";
        } else if (getEstado_usuario_N() == "Maranhão") {
            $selectMA = "selected";
        } else if (getEstado_usuario_N() == "Mato Grosso") {
            $selectMT = "selected";
        } else if (getEstado_usuario_N() == "Mato Grosso do Sul") {
            $selectMS = "selected";
        } else if (getEstado_usuario_N() == "Minas Gerais") {
            $selectMG = "selected";
        } else if (getEstado_usuario_N() == "Pará") {
            $selectPA = "selected";
        } else if (getEstado_usuario_N() == "Paraíba") {
            $selectPB = "selected";
        } else if (getEstado_usuario_N() == "Paraná") {
            $selectPR = "selected";
        } else if (getEstado_usuario_N() == "Pernambuco") {
            $selectPE = "selected";
        } else if (getEstado_usuario_N() == "Piauí") {
            $selectPI = "selected";
        } else if (getEstado_usuario_N() == "Rio de Janeiro") {
            $selectRJ = "selected";
        } else if (getEstado_usuario_N() == "Rio Grande do Norte") {
            $selectRN = "selected";
        } else if (getEstado_usuario_N() == "Rondônia") {
            $selectRO = "selected";
        } else if (getEstado_usuario_N() == "Rio Grande do Sul") {
            $selectRS = "selected";
        } else if (getEstado_usuario_N() == "Roraima") {
            $selectRR = "selected";
        } else if (getEstado_usuario_N() == "Santa Catarina") {
            $selectSC = "selected";
        } else if (getEstado_usuario_N() == "Sergipe") {
            $selectSE = "selected";
        } else if (getEstado_usuario_N() == "São Paulo") {
            $selectSP = "selected";
        } else if (getEstado_usuario_N() == "Tocantins") {
            $selectTO = "selected";
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

                    if ($func == 'edit') {
                        echo "<div class='alert alert-success fade in'>"
                        . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                        . "<strong>Pronto!</strong> Os seus dados de cadastro foram atualizados com sucesso!"
                        . "</div>";
                    } else if ($func == 'senha') {
                        echo "<div class='alert alert-success fade in'>"
                        . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                        . "<strong>Pronto!</strong> A sua senha foi alterada com sucesso!"
                        . "</div>";
                    }
                }
                ?>

                <div class="cabecalho center">
                    <h2>Meus Dados</h2>
                </div>

                <form action="../php_paginas/editar_meus_dados.php" method="post" id="formDados" class="form-horizontal">
                    <input type="hidden" value="<?php echo getId_usuario(); ?>" name="id_usuario">
                    <fieldset>
                        <legend>Dados Pessoais</legend>
                        <div class="campo">
                            <label class="control-label">Nome Completo:</label>
                            <div class="controls">
                                <input class="input-xlarge" type="text" name="nome" value="<?php echo getNome_usuario_N(); ?>" required>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">CPF:</label>
                            <div class="controls">
                                <input class="input-medium" type="text" name="cpf" value="<?php echo getCPF_usuario_N(); ?>" disabled>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Idade:</label>
                            <div class="controls">
                                <input class="input-mini" type="text" maxlength="3" name="idade" value="<?php echo getIdade_usuario_N(); ?>" required>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Telefone:</label>
                            <div class="controls">
                                <input class="input-small" type="text" maxlength="11" name="telefone" value="<?php echo getTelefone_usuario_N(); ?>">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Endereço</legend>
                        <div class="campo">
                            <label class="control-label">CEP:</label>
                            <div class="controls">
                                <input class="input-small" type="text" maxlength="8" name="cep" value="<?php echo getCEP_usuario_N(); ?>" required>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Rua:</label>
                            <div class="controls">
                                <input class="input-xlarge" type="text" name="rua" value="<?php echo getRua_usuario_N(); ?>"> 
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Número:</label>
                            <div class="controls">
                                <input class="input-mini" type="text" name="ncasa" value="<?php echo getNCasa_usuario_N(); ?>">
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Bairro:</label>
                            <div class="controls">
                                <input class="input-medium" type="text" name="bairro" value="<?php echo getBairro_usuario_N(); ?>">
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Complemento: </label>
                            <div class="controls">
                                <input class="input-xxlarge" type="text" name="complemento" value="<?php echo getComplemento_usuario_N(); ?>">
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Cidade / Estado: </label>
                            <div class="controls">
                                <input class="input-medium" type="text" name="cidade" value="<?php echo getCidade_usuario_N(); ?>" required>
                                <select class="input-mini" name="estado">
                                    <option value="Acre" <?php echo isset($selectAC) ? "$selectAC" : ""; ?>>AC</option> 
                                    <option value="Alagoas" <?php echo isset($selectAL) ? "$selectAL" : ""; ?>>AL</option> 
                                    <option value="Amazonas" <?php echo isset($selectAM) ? "$selectAM" : ""; ?>>AM</option> 
                                    <option value="Amapá" <?php echo isset($selectAP) ? "$selectAP" : ""; ?>>AP</option> 
                                    <option value="Bahia" <?php echo isset($selectBA) ? "$selectBA" : ""; ?>>BA</option> 
                                    <option value="Ceará" <?php echo isset($selectCE) ? "$selectCE" : ""; ?>>CE</option> 
                                    <option value="Distrito Federal" <?php echo isset($selectDF) ? "$selectDF" : ""; ?>>DF</option> 
                                    <option value="Espírito Santo" <?php echo isset($selectES) ? "$selectES" : ""; ?>>ES</option> 
                                    <option value="Goiás" <?php echo isset($selectGO) ? "$selectGO" : ""; ?>>GO</option> 
                                    <option value="Maranhão" <?php echo isset($selectMA) ? "$selectMA" : ""; ?>>MA</option> 
                                    <option value="Mato Grosso" <?php echo isset($selectMT) ? "$selectMT" : ""; ?>>MT</option> 
                                    <option value="Mato Grosso do Sul" <?php echo isset($selectMS) ? "$selectMS" : ""; ?>>MS</option> 
                                    <option value="Minas Gerais" <?php echo isset($selectMG) ? "$selectMG" : ""; ?>>MG</option> 
                                    <option value="Pará" <?php echo isset($selectPA) ? "$selectPA" : ""; ?>>PA</option> 
                                    <option value="Paraíba" <?php echo isset($selectPB) ? "$selectPB" : ""; ?>>PB</option> 
                                    <option value="Paraná" <?php echo isset($selectPR) ? "$selectPR" : ""; ?>>PR</option> 
                                    <option value="Pernambuco" <?php echo isset($selectPE) ? "$selectPE" : ""; ?>>PE</option> 
                                    <option value="Piauí" <?php echo isset($selectPI) ? "$selectPI" : ""; ?>>PI</option> 
                                    <option value="Rio de Janeiro" <?php echo isset($selectRJ) ? "$selectRJ" : ""; ?>>RJ</option> 
                                    <option value="Rio Grande do Norte" <?php echo isset($selectRN) ? "$selectRN" : ""; ?>>RN</option> 
                                    <option value="Rio Grande do Sul" <?php echo isset($selectRS) ? "$selectRS" : ""; ?>>RS</option> 
                                    <option value="Rondônia" <?php echo isset($selectRO) ? "$selectRO" : ""; ?>>RO</option> 
                                    <option value="Roraima" <?php echo isset($selectRR) ? "$selectRR" : ""; ?>>RR</option> 
                                    <option value="Santa Catarina" <?php echo isset($selectSC) ? "$selectSC" : ""; ?>>SC</option> 
                                    <option value="Sergipe" <?php echo isset($selectSE) ? "$selectSE" : ""; ?>>SE</option> 
                                    <option value="São Paulo" <?php echo isset($selectSP) ? "$selectSP" : ""; ?>>SP</option> 
                                    <option value="Tocantins" <?php echo isset($selectTO) ? "$selectTO" : ""; ?>>TO</option> 
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Dados de Login<a href="alterar_senha.php" class="btn pull-right">Alterar Senha</a></legend>
                        <div class="campo">
                            <label class="control-label">Email: </label>
                            <div class="controls">
                                <input name="email" type="email" value="<?php echo getEmail_usuario_N(); ?>" disabled>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Senha: </label>
                            <div class="controls">
                                <input class="input-medium" type="password" name="senha1" value="********" disabled>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                    </div>
                </form>
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
