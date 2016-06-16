<?php
include '../../php_default/controle_login.php';

$queryVoluntario = "SELECT * FROM t_voluntario WHERE id_voluntario='" . getId_usuario() . "'";
$resultVoluntario = mysqli_query($link, $queryVoluntario);

while ($row = mysqli_fetch_assoc($resultVoluntario)) {
    $data_admissao = $row['data_admissao'];
    $horario_disp = $row['horario_disp'];
    $agenda = $row['agenda'];
}
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Área do Voluntário | Melhor Amigo</title>

        <!-- Bootstrap -->
        <link href="../../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../../css/cadastro_usuario.css" />
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
                    if (getNivel_usuario() == 2) {
                        $linkAreaVoluntario = "area_voluntario.php";
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
                        . "<strong>Pronto!</strong> Os seus dados de voluntário foram atualizados com sucesso!"
                        . "</div>";
                    }
                }
                ?>

                <div class="cabecalho center">
                    <h2>Área do Voluntário</h2>
                </div>

                <form action="../../php_paginas/voluntario/alterar_dados_voluntario.php" method="post" id="formDados" class="form-horizontal">
                    <fieldset>
                        <legend>Dados de Voluntário<a class="btn btn-link pull-right" href="../confirmacao.php?func=noVoluntario">Deixar de ser voluntário</a></legend>
                        <div class="campo">
                            <label class="control-label">Data de Admissão:</label>
                            <div class="controls">
                                <input class="input-small" type="text" name="data_admissao" value="<?php echo $data_admissao; ?>" disabled>
                            </div>
                        </div>
                        <div class="campo">
                            <label class="control-label">Horário Disponível:</label>
                            <div class="controls">
                                <textarea name="horario_disp" rows="3" class="input-xlarge" required><?php echo $horario_disp; ?></textarea>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Agenda</legend>
                        <textarea name="agenda" rows="15" class="input-block-level"><?php echo $agenda; ?></textarea>
                    </fieldset>
                    <div class="form-actions">
                        <button type="submit" class="btn">Salvar Alterações</button>
                    </div>
                </form>
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