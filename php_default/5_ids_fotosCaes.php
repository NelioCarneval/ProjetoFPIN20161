<?php

do {
    do {
        $idFoto1 = mt_rand(1, $maior_id);
    } while (!isset($cao[$idFoto1]));
} while (!$cao[$idFoto1]["status_disponivel"] OR ( $cao[$idFoto1]["src_imagem"] == 'img/caes/cao_0.png'));
do {
    do {
        $idFoto2 = mt_rand(1, $maior_id);
    } while (!isset($cao[$idFoto2]));
} while ($idFoto2 == $idFoto1 OR ! $cao[$idFoto2]["status_disponivel"] OR ( $cao[$idFoto2]["src_imagem"] == 'img/caes/cao_0.png'));
do {
    do {
        $idFoto3 = mt_rand(1, $maior_id);
    } while (!isset($cao[$idFoto3]));
} while ($idFoto3 == $idFoto1 OR $idFoto3 == $idFoto2 OR ! $cao[$idFoto3]["status_disponivel"] OR ( $cao[$idFoto3]["src_imagem"] == 'img/caes/cao_0.png'));
do {
    do {
        $idFoto4 = mt_rand(1, $maior_id);
    } while (!isset($cao[$idFoto4]));
} while ($idFoto4 == $idFoto1 OR $idFoto4 == $idFoto2 OR $idFoto4 == $idFoto3 OR ! $cao[$idFoto4]["status_disponivel"] OR ( $cao[$idFoto4]["src_imagem"] == 'img/caes/cao_0.png'));
do {
    do {
        $idFoto5 = mt_rand(1, $maior_id);
    } while (!isset($cao[$idFoto5]));
} while ($idFoto5 == $idFoto1 OR $idFoto5 == $idFoto2 OR $idFoto5 == $idFoto3 OR $idFoto5 == $idFoto4 OR ! $cao[$idFoto5]["status_disponivel"] OR ( $cao[$idFoto5]["src_imagem"] == 'img/caes/cao_0.png'));
