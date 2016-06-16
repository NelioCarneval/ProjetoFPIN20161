<?php include '../../php_default/controle_login.php'; ?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Controle de Cães | Melhor Amigo</title>

        <!-- Bootstrap -->
        <link href="../../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../../css/admin/controle_caes.css" />

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
                <?php
                $placehold = "placeholder='Buscar Cão'";

                if (isset($_GET['busca'])) {
                    $busca = $_GET['busca'];

                    if ($busca) {
                        $placehold = "value='$busca'";
                    }
                } else {
                    $busca = "";
                }

                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'disponivel') {
                        $checked = "checked";
                    }
                } else {
                    $checked = "";
                }
                ?>

                <div class="cabecalho center">
                    <h2>Controle de Cães</h2>
                </div>

                <form class="form-search center">
                    <input type="text" class="input-medium" title="Buscar Cão" <?php echo $placehold; ?> name="busca">
                    <button type="submit" class="btn" title="Buscar Cão"><i class="icon-search"></i></button>
                    <p class="opcoesBusca"><input name="status" type="checkbox" value="disponivel" <?php echo $checked; ?>> Apenas disponíveis</p>
                </form>

                <fieldset id="listaCaes">
                    <legend><a href="controle_caes.php" class="linkFicha">Lista de Cães</a> <a href="?func=detalhes"><small>+Detalhes</small></a><a href="cadastro_cao.php" class="btn pull-right">Cadastrar Cão</a></legend>
                    <?php
                    if (isset($_GET['func'])) {
                        $func = $_GET['func'];
                        if ($func == 'new') {
                            echo "<div class='alert alert-success fade in'>"
                            . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                            . "<strong>Pronto!</strong> O cadastro foi realizado com sucesso!"
                            . "</div>";
                        } else if ($func == 'edit') {
                            echo "<div class='alert alert-success fade in'>"
                            . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                            . "<strong>Pronto!</strong> As informações do cão foram atualizadas com sucesso!"
                            . "</div>";
                        } else if ($func == 'detalhes') {
                            $totalMacho = 0;
                            $totalFemea = 0;
                            $totalDisp = 0;

                            for ($i = 1; $i <= $maior_id; $i++) {
                                if (isset($cao[$i])) {
                                    if (getStatus_disponivel_cao($i) == 1) {
                                        $totalDisp++;
                                        if (strncasecmp('m', getGenero_cao($i), 1) == 0) {
                                            $totalMacho++;
                                        } else if (strncasecmp('f', getGenero_cao($i), 1) == 0) {
                                            $totalFemea++;
                                        }
                                    }
                                }
                            }

                            echo "<div class='alert alert-info'>"
                            . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                            . "Total de cães disponíveis: <strong>$totalDisp</strong><br/>"
                            . "- Machos: <strong>$totalMacho</strong><br/>"
                            . "- Fêmeas: <strong>$totalFemea</strong><br/>"
                            . "</div>";
                        }
                    }
                    ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Idade</th>
                                <th>Gênero</th>
                                <th>Porte</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nBusca = strlen($busca); // Pega numero de caracteres de $busca
                            $caesNaLista = 0;
                            $status = 1;

                            if ($num_caes > 0) {
                                for ($i = 1; $i <= $maior_id; $i++) {
                                    if (isset($cao[$i])) {

                                        if (isset($_GET['status'])) {
                                            if ($_GET['status'] == 'disponivel') {
                                                $status = getStatus_disponivel_cao($i);
                                            }
                                        }

                                        if ((strncasecmp($busca, getNome_cao($i), $nBusca) == 0) & ($status == 1)) {
                                            $caesNaLista++;

                                            echo
                                            "<tr class='" . (getStatus_disponivel_cao($i) == 1 ? "success" : "error") . "'>
                                                <td><a href='../ficha_cao.php?id=" . getId_cao($i) . "' target='_BLANK' class='linkFicha'>" . getId_cao($i) . "</a></td>
                                                <td><a href='../ficha_cao.php?id=" . getId_cao($i) . "' target='_BLANK' class='linkFicha'>" . getNome_cao($i) . "</a></td>
                                                <td>" . getIdade_cao($i) . " Anos</td>
                                                <td>" . getGenero_cao($i) . "</td>
                                                <td>" . getPorte_cao($i) . "</td>
                                                <td class='tdStatus'>" . (getStatus_disponivel_cao($i) == 1 ? "Disponível" : "Não Disponível") . "<a href='editar_cao.php?id=" . getId_cao($i) . "' class='pull-right btn btn-small' title='Editar'><i class='icon-pencil'></i></a></td>
                                            </tr>";
                                        }
                                    }
                                }
                            }

                            if ($caesNaLista == 0) {
                                echo
                                "<tr class='info'>
                                    <td colspan='6'>Nenhum Cãozinho foi encontrado!</td>
                                </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </fieldset>
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