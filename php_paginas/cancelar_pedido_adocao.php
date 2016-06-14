<?php

include ('../php_default/controle_login.php');

mysqli_query($link, "DELETE FROM `t_solicit_adocao` WHERE `t_solicit_adocao`.`status_aprovacao` = 0 and `t_solicit_adocao`.`id_adotante` = '" . getId_usuario() . "'");

header("location: ../paginas/adocao.php?cancel=ok#pedidos");