<?php
$queryVoluntario = "SELECT * FROM t_voluntario WHERE id_voluntario='$id_usuario_N'";
$resultVoluntario = mysqli_query($link, $queryVoluntario);

while ($row = mysqli_fetch_assoc($resultVoluntario)) {
    $data_admissao = $row['data_admissao'];
    $horario_disp = $row['horario_disp'];
}
?>

<fieldset>
    <legend>Dados de Voluntário</legend>
    <div class="campo">
        <label class="control-label">Data de Admissão:</label>
        <div class="controls">
            <input class="input-small" type="text" name="data_admissao" value="<?php echo $data_admissao; ?>" disabled>
        </div>
    </div>
    <div class="campo">
        <label class="control-label">Horário Disponível:</label>
        <div class="controls">
            <textarea name="horario_disp" rows="3" class="input-xlarge" disabled><?php echo $horario_disp; ?></textarea>
        </div>
    </div>
</fieldset>