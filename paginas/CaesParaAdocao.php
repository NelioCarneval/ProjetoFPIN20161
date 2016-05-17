<!DOCTYPE html>

<html>
    <head>
        <?php include('../php/Cadastro_Caes.php'); ?>

        <meta charset="UTF-8">
        <title>Adoção de Cães | Melhor Amigo</title>

        <link rel="stylesheet" type="text/css" href="../css/LayoutDefault.css">
        <link rel="stylesheet" type="text/css" href="../css/CaesParaAdocao.css">
    </head>

    <body>

        <div id="wrap">
            <p><a href="../index.html"><img id="logoPrincipal" src="../img/logo_melhor_amigo.png"></a></p>

            <header>
                <nav>
                    <p><a href="CaesParaAdocao.php">Adoções</a><a href="PaginaPadrinho.php">Apadrinhamento</a><a href="PaginaDoacao.html">Doações</a><a href="Voluntario_LOGIN.html">Voluntários</a><a href="PaginaLogin.html">Entrar</a><a href="FormularioDeCadastro2.html">Cadastre-se</a></p>
                </nav>
            </header>

            <div id="content">
                <h2 class="quote">Cães para Adoção</h2>

                <h3 class="quote">Ao adotar um animal de estimação você poderá dar e receber carinho</h3>

                <p class="quote">Agradecemos seu interesse em adotar um de nossos amiguinhos. Mas, se você tem interesse mesmo, precisamos saber um pouco mais de você, pois do ponto de vista do cão, ser abandonado pelo amigo é muito doloroso... Eles já sofreram isso uma vez e não queremos que isso se repita. Eles não merecem ser tratados com desprezo.</p>
                <p class="quote">Após escolher um de nossos cãezinhos, uma ficha de proposta de adoção deverá ser totalmente preenchida. Após análise, entraremos em contato com você.</p>

                <table>
                    <thead>
                    <th colspan="3">Conheça nossos cãezinhos</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_1.php">
                                    <img src="../img/caes/cao_01.jpg" alt="<?php echo $cao_1["nome"]; ?>" title="<?php echo $cao_1["nome"]; ?>" />
                                </a>
                            </td>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_2.php">
                                    <img src="../img/caes/cao_02.jpg" alt="<?php echo $cao_2["nome"]; ?>" title="<?php echo $cao_2["nome"]; ?>" />
                                </a>
                            </td>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_3.php">
                                    <img src="../img/caes/cao_03.jpg" alt="<?php echo $cao_3["nome"]; ?>" title="<?php echo $cao_3["nome"]; ?>" />
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_4.php">
                                    <img src="../img/caes/cao_04.jpg" alt="<?php echo $cao_4["nome"]; ?>" title="<?php echo $cao_4["nome"]; ?>" />
                                </a>
                            </td>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_5.php">
                                    <img src="../img/caes/cao_05.jpg" alt="<?php echo $cao_5["nome"]; ?>" title="<?php echo $cao_5["nome"]; ?>" />
                                </a>
                            </td>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_6.php">
                                    <img src="../img/caes/cao_06.jpg" alt="<?php echo $cao_6["nome"]; ?>" title="<?php echo $cao_6["nome"]; ?>" />
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_7.php">
                                    <img src="../img/caes/cao_07.jpg" alt="<?php echo $cao_7["nome"]; ?>" title="<?php echo $cao_7["nome"]; ?>" />
                                </a>
                            </td>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_8.php">
                                    <img src="../img/caes/cao_08.jpg" alt="<?php echo $cao_8["nome"]; ?>" title="<?php echo $cao_8["nome"]; ?>" />
                                </a>
                            </td>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_9.php">
                                    <img src="../img/caes/cao_09.jpg" alt="<?php echo $cao_9["nome"]; ?>" title="<?php echo $cao_9["nome"]; ?>" />
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_10.php">
                                    <img src="../img/caes/cao_10.jpg" alt="<?php echo $cao_10["nome"]; ?>" title="<?php echo $cao_10["nome"]; ?>" />
                                </a>
                            </td>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_11.php">
                                    <img src="../img/caes/cao_11.jpg" alt="<?php echo $cao_11["nome"]; ?>" title="<?php echo $cao_11["nome"]; ?>" />
                                </a>
                            </td>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_12.php">
                                    <img src="../img/caes/cao_12.jpg" alt="<?php echo $cao_12["nome"]; ?>" title="<?php echo $cao_12["nome"]; ?>" />
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="paginas" colspan="3">
                                <a href="#">< Anterior</a> | <a href="#">Próxima ></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>	

            <footer>
                <nav>
                    <p>
                        <a href="SobreNos.html">Sobre</a>
                        <a href="../index.html">Início</a>
                        <a href="LocalizacaoDaONG.html">Localização</a>
                    </p>
                </nav>
            </footer>
        </div>

    </body>
</html>
