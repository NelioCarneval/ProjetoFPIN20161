<?php

function active($link) {
    $link_completo = explode("/", $_SERVER['PHP_SELF']);
    $linkAtual = end($link_completo);
    if ($linkAtual == $link) {
        echo "class='active'";
    }
}
?>

<p><a href="<?php echo $linkInicio; ?>"><img id="logoPrincipal" alt="Logo-ONG" src="<?php echo $linkLogo; ?>"></a></p>
<div class="navbar navbar-inverse navbar-static-top">
    <div class="navbar-inner">
        <ul class="nav">
            <li <?php active($linkInicio) ?>><a href="<?php echo $linkInicio; ?>">Início</a></li>
            <li <?php active($linkCaes) ?>><a href="<?php echo $linkCaes; ?>">Cães</a></li>
            <li <?php active($linkAdocao) ?>><a href="<?php echo $linkAdocao; ?>">Adoção</a></li>
            <li <?php active($linkApadrinhamento) ?>><a href="<?php echo $linkApadrinhamento; ?>">Apadrinhamento</a></li>
            <li <?php active($linkVoluntarios) ?>><a href="<?php echo $linkVoluntarios; ?>">Voluntários</a></li>
            <li <?php active($linkDoacoes) ?>><a href="<?php echo $linkDoacoes; ?>">Doações</a></li>
        </ul>
        <ul class="nav pull-right">
            <?php
            if (verificaLogin()) {
                if (getNivel_usuario() == 0) {
                    //Header Adotante
                    include ('header_usuarios/comum_adotante.php');
                }
                else if(getNivel_usuario() == 1){
                    //Header Padrinho
                     include ('header_usuarios/padrinho.php');
                }
                else if(getNivel_usuario() == 2){
                    //Header Voluntário
                     include ('header_usuarios/voluntario.php');
                }
                else if(getNivel_usuario() >= 3){
                    //Header Administrador
                     include ('header_usuarios/admin.php');
                }
            } else {
                include ('header_usuarios/anonimo.php');
            }
            ?>
        </ul>
    </div>
</div>