<?php
$querySolicitAnteriores = "SELECT id_cao, data_solicit, status_aprovacao FROM t_solicit_adocao WHERE id_adotante = '" . getId_usuario() . "'";
$resultSolicitAnteriores = mysqli_query($link, $querySolicitAnteriores);
$numLinhasResult = mysqli_num_rows($resultSolicitAnteriores);

$temPedidoPendente = FALSE;

if ($numLinhasResult > 0) {
    $num = 0;

    while ($row = mysqli_fetch_assoc($resultSolicitAnteriores)) {
        $num++;

        $id_cao = $row['id_cao'];
        $data_solicit = $row['data_solicit'];
        $status_aprovacao = $row['status_aprovacao'];

        $pedidos[$num]["id_cao"] = $id_cao;
        $pedidos[$num]["data_solicit"] = $data_solicit;

        if ($status_aprovacao == 0) {
            $pedidos[$num]["status_aprovacao"] = "Pendente";
            $pedidos[$num]["classe_bootstrap"] = "warning";
            $temPedidoPendente = TRUE;
        } else if ($status_aprovacao == 1) {
            $pedidos[$num]["status_aprovacao"] = "Recusado";
            $pedidos[$num]["classe_bootstrap"] = "error";
        } else if ($status_aprovacao == 2) {
            $pedidos[$num]["status_aprovacao"] = "Aprovado";
            $pedidos[$num]["classe_bootstrap"] = "success";
        }
    }

    function getId_cao_pedido($numPedido) {
        global $pedidos;
        return $pedidos[$numPedido]["id_cao"];
    }

    function getData_solicit_pedido($numPedido) {
        global $pedidos;
        return $pedidos[$numPedido]["data_solicit"];
    }

    function getStatus_aprovacao_pedido($numPedido) {
        global $pedidos;
        return $pedidos[$numPedido]["status_aprovacao"];
    }

    function getClasse_bootstrap_pedido($numPedido) {
        global $pedidos;
        return $pedidos[$numPedido]["classe_bootstrap"];
    }

    function addCancelar($status) {
        if ($status == "Pendente") {
            return "<a href='../php_paginas/cancelar_pedido_adocao.php' title='Cancelar Pedido'><i class='icon-remove pull-right'></i></a>";
        }
    }

}
?>

<fieldset id="pedidos">
    <legend class="center">Seus pedidos de adoção</legend>
    <?php
    if ($temPedidoPendente) {
        echo
        "<div class='alert fade in'>
            <button type='button' class='close' data-dismiss='alert'>×</button>
            <strong>Você tem um pedido pendente!</strong> Por favor aguarde, entraremos em contato com você em breve!
        </div>";
    } else if (isset($_GET['cancel'])) {
        if($_GET['cancel'] == "ok"){
            echo
            "<div class='alert fade in'>
                <button type='button' class='close' data-dismiss='alert'>×</button>
                <strong>Pedido de adoção cancelado com sucesso!</strong> Estamos esperando outro pedido seu!
            </div>";
        }
    }
    ?>
    <table class="table">
        <thead>
            <tr>
                <th>Pedidos</th>
                <th>Data</th>
                <th>Nome do Cão</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="img-polaroid">
            <?php
            if ($numLinhasResult > 0) {
                for ($i = $num; $i > 0; $i--) {
                    echo
                    "<tr class='" . getClasse_bootstrap_pedido($i) . "'>
                        <td>" . $i . "</td>
                        <td>" . getData_solicit_pedido($i) . "</td>
                        <td>" . getNome_cao(getId_Cao_Pedido($i)) . "</td>
                        <td>" . getStatus_aprovacao_pedido($i) . addCancelar(getStatus_aprovacao_pedido($i)) . "</td>
                    </tr>";
                }
            } else {
                echo
                "<tr class='info'>
                    <td colspan='4'>Você ainda não fez nenhum pedido de adoção! <a href='" . $linkCaes . "'>Conheça nossos cãezinhos</a> e faça o seu pedido!</td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</fieldset>