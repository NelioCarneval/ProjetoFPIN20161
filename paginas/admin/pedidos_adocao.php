<?php
include '../../php_default/controle_login.php';

$queryPedidos = "SELECT * FROM t_solicit_adocao, t_usuario where status_aprovacao=0 AND t_solicit_adocao.id_adotante=t_usuario.id_usuario ORDER BY data_solicit";
$resultPedidos = mysqli_query($link, $queryPedidos);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Pedidos de Adoção | Melhor Amigo</title>

        <!-- Bootstrap -->
        <link href="../../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../../css/admin/pedidos_adocao_voluntario.css" />

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
                $placehold = "placeholder='Buscar'";

                if (isset($_GET['busca'])) {
                    $busca = $_GET['busca'];

                    if ($busca) {
                        $placehold = "value='$busca'";
                    }
                } else {
                    $busca = "";
                }

                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'todos') {
                        $checkedStatus = "checked";
                    }
                } else {
                    $checkedStatus = "";
                }

                if (isset($_GET['por'])) {
                    if ($_GET['por'] == 'user') {
                        $por = 'u';
                    } else if ($_GET['por'] == 'cao') {
                        $por = 'c';
                    }
                } else {
                    $por = 'c';
                }
                ?>

                <div class="cabecalho center">
                    <h2>Pedidos de Adoção</h2>
                </div>

                <form class="form-search center">
                    <input type="text" class="input-medium" title="Buscar por Cão" <?php echo $placehold; ?> name="busca">
                    <button type="submit" class="btn" title="Buscar por Cão"><i class="icon-search"></i></button>
                    <p class="opcoesBusca"><input name="por" type="radio" value="cao" <?php echo $por == 'c' ? "checked" : "" ?>> Buscar por cão <input type="radio" name="por" value="user" class="opcoesMargin" <?php echo $por == 'u' ? "checked" : "" ?>> Buscar por usuário</p>
                </form>

                <fieldset id="listaCaes">
                    <legend><a href="pedidos_adocao.php" class="linkFicha">Pedidos</a></legend>
                    <?php
                    if (isset($_GET['func'])) {
                        $func = $_GET['func'];
                        if ($func == 'nao') {
                            echo "<div class='alert alert-error fade in'>"
                            . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                            . "<strong>Recusado!</strong> O pedido de adoção foi recusado por você com sucesso!"
                            . "</div>";
                        } else if ($func == 'sim') {
                            echo "<div class='alert alert-success fade in'>"
                            . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                            . "<strong>Aceito!</strong> O pedido de adoção foi aceito por você  com sucesso!"
                            . "</div>";
                        }
                    }
                    ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Data</th>
                                <th>Cão</th>
                                <th>Adotante</th>
                                <th>Mensagem do Usuário</th>
                                <th>Responder</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nBusca = strlen($busca); // Pega numero de caracteres de $busca
                            $PedidosNaLista = 0;

                            while ($row = mysqli_fetch_assoc($resultPedidos)) {
                                if ((strncasecmp($busca, getNome_cao($row['id_cao']), $nBusca) == 0) & ($por == 'c') OR ( strncasecmp($busca, $row['nome'], $nBusca) == 0) & ($por == 'u')) {
                                    $string = explode(" ", $row['nome']);
                                    $nome = $string[0];

                                    $PedidosNaLista++;

                                    echo
                                    "<tr>
                                        <td>" . $row['cod_solicit'] . "</td>
                                        <td class='tdData'>" . $row['data_solicit'] . "</td>
                                        <td class='tdNomeCao'><a href='../ficha_cao.php?id=" . getId_cao($row['id_cao']) . "' target='_BLANK' class='linkFicha'>" . getNome_cao($row['id_cao']) . "</a></td>
                                        <td><a href='dados_usuario_N.php?id=" . $row['id_adotante'] . "' target='_BLANK' class='linkFicha'>" . $nome . "</td>
                                        <td class='tdMsg'><blockquote>" . $row['mensagem'] . "</blockquote></td>
                                        <td class='tdResp'>
                                            <a href='../../php_paginas/admin/responder_pedido_adocao.php?cod=" . $row['cod_solicit'] . "&resp=s' class='btn btn-small btn-success pull-left' title='Aceitar Pedido'><i class='icon-ok icon-white'></i></a>
                                            <a href='../../php_paginas/admin/responder_pedido_adocao.php?cod=" . $row['cod_solicit'] . "&resp=n' class='btn btn-small btn-danger pull-right' title='Recusar Pedido'><i class='icon-remove icon-white'></i></a>
                                        </td>
                                    </tr>";
                                }
                            }

                            if ($PedidosNaLista == 0) {
                                echo
                                "<tr class='info'>
                                    <td colspan='6'>Nenhum pedido de adoção foi encontrado!</td>
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