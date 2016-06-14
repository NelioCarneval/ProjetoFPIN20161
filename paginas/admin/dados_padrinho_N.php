<?php
$queryPadrinho = "SELECT t_padrinho.*, t_cao.nome FROM t_padrinho,t_cao WHERE id_padrinho='$id_usuario_N' AND t_padrinho.id_cao=t_cao.id_cao";
$resultPadrinho = mysqli_query($link, $queryPadrinho);

while ($row = mysqli_fetch_assoc($resultPadrinho)) {
    $id_cao_atual = $row['id_cao'];
    $nome_cao = $row['nome'];
    $valor_mensal = $row['valor_mensal'];
    $dia_vencimento = $row['dia_vencimento'];
    $modo_boleto = $row['modo_boleto'];
    $data_apadrinhamento = $row['data_apadrinhamento'];
}
?>

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
            <input class="input-small" type="text" name="nome_cao" value="<?php echo $nome_cao; ?>" disabled>
        </div>
    </div> 
    <div class="campo">
        <label class="control-label">Valor Mensal:</label>
        <div class="controls input-prepend">
            <span class="add-on">R$</span>
            <input class="input-mini" type="text" name="valor_mensal" maxlength="7" value="<?php echo $valor_mensal; ?>" disabled>
        </div>
    </div>
    <div class="campo">
        <label class="control-label">Dia de Vencimento:</label>
        <div class="controls input-prepend">
            <span class="add-on">Dia</span>
            <input class="input-mini" type="text" name="dia_vencimento" maxlength="2" value="<?php echo $dia_vencimento; ?>" disabled>
        </div>
    </div>
    <div class="campo">
        <label class="control-label">Modo de boleto:</label>
        <div class="controls">
            <input class="input-medium" type="text" name="modo_boleto" value="<?php echo $modo_boleto; ?>" disabled>
        </div>
    </div>
</fieldset>