<li id="fat-menu" class="dropdown">
    <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo getPrimeiroNome_usuario(); ?> <b class="caret"></b></a>
    <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
        <li><a tabindex="-1" href="<?php echo $linkMeusDados; ?>">Meus Dados</a></li>
        <li class="divider"></li>
        <li><a tabindex="-1" href="<?php echo $linkPedidosAdocao; ?>">Pedidos de Adoção</a></li>
        <li><a tabindex="-1" href="<?php echo $linkPedidosVoluntario; ?>">Pedidos p/voluntariar</a></li>
        <li class="divider"></li>
        <li><a tabindex="-1" href="<?php echo $linkControleCaes; ?>">Controle de Cães</a></li>
        <li><a tabindex="-1" href="<?php echo $linkControleUsuarios; ?>">Controle de Usuários</a></li>
        <li class="divider"></li>
        <li><a tabindex="-1" href="<?php echo $linkLogout; ?>">Sair</a></li>
    </ul>
</li>