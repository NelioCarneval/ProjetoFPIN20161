<?php
include '../../php_default/controle_login.php';

$queryPadrinho = "SELECT * FROM t_padrinho WHERE id_padrinho='" . getId_usuario() . "'";
$resultPadrinho = mysqli_query($link, $queryPadrinho);

while ($row = mysqli_fetch_assoc($resultPadrinho)) {
    $id_cao_atual = $row['id_cao'];
    $valor_mensal = $row['valor_mensal'];
    $dia_vencimento = $row['dia_vencimento'];
    $modo_boleto = $row['modo_boleto'];
    $data_apadrinhamento = $row['data_apadrinhamento'];
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Área do Padrinho | Melhor Amigo</title>

        <!-- Bootstrap -->
        <link href="../../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../../css/ficha_cao.css" />        
        <link rel="stylesheet" type="text/css" href="../../css/padrinho/area_padrinho.css" />

        <?php include('../../php_default/registro_caes.php'); ?>
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
                    if (getNivel_usuario() == 1) {
                        $linkAreaPadrinho = "area_padrinho.php";
                    } else {
                        header("location: ../../index.php");
                    }
                } else {
                    header("location: ../login_usuario.php");
                }

                include('../../php_default/header_e_footer/header.php');
                ?>
            </header>

            <article>
                <?php
                if (isset($_GET['func'])) {
                    $func = $_GET['func'];
                    if ($func == 'edit') {
                        echo "<div class='alert alert-success fade in'>"
                        . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                        . "<strong>Pronto!</strong> Os seus dados de apadrinhamento foram atualizados com sucesso!"
                        . "</div>";
                    }
                }
                ?>

                <div class="cabecalho center">
                    <h2>Área do Padrinho<br/>
                        <small>
                            Faça-nos uma <a href="../localizacao.php">visita</a>! Receberemos você com muito carinho!
                        </small>
                    </h2>
                </div>

                <div class="row-fluid">
                    <ul class="thumbnails">
                        <li class="span4">
                            <div class="thumbnail mythumbnail" id="ficha-cao">
                                <img src="../../<?php echo getSrc_imagem_cao($id_cao_atual); ?>" class="imgCao" alt="<?php echo getNome_cao($id_cao_atual); ?>" title="<?php echo getNome_cao($id_cao_atual); ?>">
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
                        <li id="areaPadrinho">
                            <div class="thumbnail mythumbnail">
                                <div class="caption">
                                    <form action="../../php_paginas/padrinho/alterar_dados_padrinho.php" method="post" id="formPadrinho" class="form-horizontal">
                                        <fieldset>
                                            <legend>Dados de Apadrinhamento</legend>
                                            <div class="campo">
                                                <label class="control-label">Data Inicial:</label>
                                                <div class="controls">
                                                    <input class="input-small" type="text" name="data_apadrinhamento" value="<?php echo $data_apadrinhamento; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="campo">
                                                <label class="control-label">Cão Apadrinhado:</label>
                                                <div class="controls">
                                                    <select class="input-medium" name="id_cao">
                                                        <?php
                                                        foreach ($cao as $cao) {
                                                            $selected = "";
                                                            if ($cao['id_cao'] == $id_cao_atual) {
                                                                $selected = "selected";
                                                            }
                                                            if ($cao['status_disponivel']) {
                                                                echo "<option value='" . $cao['id_cao'] . "' $selected>" . $cao['nome'] . "</option> ";
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="campo">
                                                <label class="control-label">Valor Mensal:</label>
                                                <div class="controls input-prepend">
                                                    <span class="add-on">R$</span>
                                                    <input class="input-mini" type="text" name="valor_mensal" maxlength="7" value="<?php echo $valor_mensal; ?>" required>
                                                </div>
                                            </div>
                                            <div class="campo">
                                                <label class="control-label">Dia de Vencimento:</label>
                                                <div class="controls input-prepend">
                                                    <span class="add-on">Dia</span>
                                                    <input class="input-mini" type="text" name="dia_vencimento" maxlength="2" value="<?php echo $dia_vencimento; ?>" required>
                                                </div>
                                            </div>
                                            <div class="campo">
                                                <label class="control-label">Modo de boleto:</label>
                                                <div class="controls">
                                                    <select class="input-medium" name="modo_boleto">
                                                        <option value="Email" <?php echo $modo_boleto == 'Email' ? "selected" : "" ?>>Email</option> 
                                                        <option value="Correspondência" <?php echo $modo_boleto == 'Correspondência' ? "selected" : "" ?>>Correspondência</option> 
                                                    </select>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-actions">
                                            <button type="submit" class="btn">Salvar Alterações</button>
                                        </div>
                                    </form>
                                    <p id="desistir"><a class="btn btn-link" href="../confirmacao.php?func=noPadrinho">Deixar de ser padrinho</a></p>
                                </div>
                            </div>
                        </li>
                    </ul>
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