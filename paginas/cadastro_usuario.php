<!DOCTYPE html>

<?php include '../php_default/controle_login.php'; ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro | Melhor Amigo</title>

        <!-- Bootstrap -->
        <link href="../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../css/cadastro_usuario.css">
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
                
                if(verificaLogin()){
                    header("location: ../index.php");
                }

                include('../php_default/header_e_footer/header.php');
                ?>
            </header>

            <article>
                <div class="cabecalho center">
                    <h2>Cadastre-se</h2>
                </div>
                
                <form action="../php_paginas/cadastrar_usuario.php" method="post" id="formCadastro" class="form-horizontal">
                    <fieldset>
                        <legend>Dados Pessoais</legend>
                        <div class="campo">
                            <label class="control-label">Nome Completo:</label>
                            <div class="controls">
                                <input class="input-xlarge" type="text" name="nome" required>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">CPF:</label>
                            <div class="controls">
                                <input class="input-small" type="text" size="11" maxlength="11" name="cpf" required>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Idade:</label>
                            <div class="controls">
                                <input class="input-mini" type="text" maxlength="3"name="idade" required>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Telefone:</label>
                            <div class="controls">
                                <input class="input-small" type="text" maxlength="11" name="telefone">
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Endereço</legend>
                        <div class="campo">
                            <label class="control-label">CEP:</label>
                            <div class="controls">
                                <input class="input-small" type="text" maxlength="8" name="cep" required>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Rua:</label>
                            <div class="controls">
                                <input class="input-xlarge" type="text" name="rua"> 
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Número:</label>
                            <div class="controls">
                                <input class="input-mini" type="text" name="ncasa">
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Bairro:</label>
                            <div class="controls">
                                <input class="input-medium" type="text" name="bairro">
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Complemento: </label>
                            <div class="controls">
                                <input class="input-xxlarge" type="text" name="complemento">
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Cidade / Estado: </label>
                            <div class="controls">
                                <input class="input-medium" type="text" name="cidade" required>
                                <select class="input-mini" name="estado">
                                    <option value="Acre">AC</option> 
                                    <option value="Alagoas">AL</option> 
                                    <option value="Amazonas">AM</option> 
                                    <option value="Amapá">AP</option> 
                                    <option value="Bahia">BA</option> 
                                    <option value="Ceará">CE</option> 
                                    <option value="Distrito Federal">DF</option> 
                                    <option value="Espírito Santo">ES</option> 
                                    <option value="Goiás">GO</option> 
                                    <option value="Maranhão">MA</option> 
                                    <option value="Mato Grosso">MT</option> 
                                    <option value="Mato Grosso do Sul">MS</option> 
                                    <option value="Minas Gerais">MG</option> 
                                    <option value="Pará">PA</option> 
                                    <option value="Paraíba">PB</option> 
                                    <option value="Paraná">PR</option> 
                                    <option value="Pernambuco">PE</option> 
                                    <option value="Piauí">PI</option> 
                                    <option value="Rio de Janeiro">RJ</option> 
                                    <option value="Rio Grande do Norte">RN</option> 
                                    <option value="Rio Grande do Sul">RS</option> 
                                    <option value="Rondônia">RO</option> 
                                    <option value="Roraima">RR</option> 
                                    <option value="Santa Catarina">SC</option> 
                                    <option value="Sergipe">SE</option> 
                                    <option value="São Paulo">SP</option> 
                                    <option value="Tocantins">TO</option> 
                                </select>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Dados de Login</legend>
                        <div class="alert alert-info fade in">
                            <button type='button' class='close' data-dismiss='alert'>×</button>
                            <strong>Atenção!</strong> Insira um email válido e a senha deverá ter no mínimo 8 caracteres
                        </div>
                        <div class="campo">
                            <label class="control-label">Email: </label>
                            <div class="controls">
                                <input name="email" type="email" placeholder="melhoramigo@exemplo.com" required>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Senha: </label>
                            <div class="controls">
                                <input class="input-medium" type="password" name="senha1" required>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Confirme a senha: </label>
                            <div class="controls">
                                <input class="input-medium" type="password" name="senha2" required>
                            </div>
                        </div>
                    </fieldset>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <button type="reset" class="btn">Limpar</button>
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