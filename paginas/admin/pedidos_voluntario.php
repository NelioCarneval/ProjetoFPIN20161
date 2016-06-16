<?php
include '../../php_default/controle_login.php';

$queryPedidos = "SELECT * FROM t_solicit_voluntario, t_usuario where status_aprovacao=0 AND t_solicit_voluntario.id_usuario=t_usuario.id_usuario ORDER BY data_solicit";
$resultPedidos = mysqli_query($link, $queryPedidos);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Pedidos p/voluntariar | Melhor Amigo</title>

        <!-- Bootstrap -->
        <link href="../../ferramentas_externas/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen">

        <link rel="stylesheet" type="text/css" href="../../css/layout_default.css" />
        <link rel="stylesheet" type="text/css" href="../../css/admin/pedidos_adocao_voluntario.css" />
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
                $placehold = "placeholder='Buscar por nome'";

                if (isset($_GET['busca'])) {
                    $busca = $_GET['busca'];

                    if ($busca) {
                        $placehold = "value='$busca'";
                    }
                } else {
                    $busca = "";
                }
                ?>

                <div class="cabecalho center">
                    <h2>Pedidos p/voluntariar</h2>
                </div>

                <form class="form-search center">
                    <input type="text" class="input-medium" title="Buscar por nome" <?php echo $placehold; ?> name="busca">
                    <button type="submit" class="btn" title="Buscar por nome"><i class="icon-search"></i></button>
                </form>

                <fieldset id="listaCaes">
                    <legend><a href="pedidos_voluntario.php" class="linkFicha">Pedidos</a></legend>
                    <?php
                    if (isset($_GET['func'])) {
                        $func = $_GET['func'];
                        if ($func == 'nao') {
                            echo "<div class='alert alert-error fade in'>"
                            . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                            . "<strong>Recusado!</strong> O pedido foi recusado por você com sucesso!"
                            . "</div>";
                        } else if ($func == 'sim') {
                            echo "<div class='alert alert-success fade in'>"
                            . "<button type='button' class='close' data-dismiss='alert'>×</button>"
                            . "<strong>Aceito!</strong> O pedido foi aceito por você  com sucesso!"
                            . "</div>";
                        }
                    }
                    ?>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Data</th>
                                <th>Usuário</th>
                                <th>Interesse</th>
                                <th>Horários</th>
                                <th>Profissão</th>
                                <th>Cães</th>
                                <th>Responder</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $nBusca = strlen($busca); // Pega numero de caracteres de $busca
                            $PedidosNaLista = 0;
                            
                            while ($row = mysqli_fetch_assoc($resultPedidos)) {
                                if (strncasecmp($busca, $row['nome'], $nBusca) == 0) {
                                    $string = explode(" ", $row['nome']);
                                    $nome = $string[0];
                                    
                                    $PedidosNaLista++;
                                    
                                    echo
                                    "<tr>
                                        <td>" . $row['cod_solicit'] . "</td>
                                        <td class='tdData'>" . $row['data_solicit'] . "</td>
                                        <td><a href='dados_usuario_N.php?id=".$row['id_usuario']."' target='_BLANK' class='linkFicha'>" . $nome . "</td>
                                        <td><blockquote>" . $row['resposta_1'] . "</blockquote></td>
                                        <td><blockquote>" . $row['resposta_2'] . "</blockquote></td>
                                        <td><blockquote>" . $row['resposta_3'] . "</blockquote></td>
                                        <td><blockquote>" . $row['resposta_4'] . "</blockquote></td>
                                        <td class='tdResp'>
                                            <a href='../../php_paginas/admin/responder_pedido_voluntario.php?cod=".$row['cod_solicit']."&resp=s' class='btn btn-small btn-success pull-left' title='Aceitar Pedido'><i class='icon-ok icon-white'></i></a>
                                            <a href='../../php_paginas/admin/responder_pedido_voluntario.php?cod=".$row['cod_solicit']."&resp=n' class='btn btn-small btn-danger pull-right' title='Recusar Pedido'><i class='icon-remove icon-white'></i></a>
                                        </td>
                                    </tr>";
                                }
                            }
                            
                            if ($PedidosNaLista == 0) {
                                echo
                                "<tr class='info'>
                                    <td colspan='8'>Nenhum pedido foi encontrado!</td>
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