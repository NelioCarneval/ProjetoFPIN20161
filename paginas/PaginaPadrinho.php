<!DOCTYPE html>

<html>
    <head>
        <?php include('../php/Cadastro_Caes.php'); ?>
        
        <meta charset="UTF-8">
        <title>Padrinho | Melhor Amigo</title>

        <link rel="stylesheet" type="text/css" href="../css/LayoutDefault.css">
        <link rel="stylesheet" type="text/css" href="../css/PaginaPadrinho.css">
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
                <h2 class="quote">Bem vindo, Padrinho!</h2>

                <p class="quote">Agradecemos seu interesse e disposição ao apadrinhar um de nossos amiguinhos. Fique a vontade para agendar uma visita!</p>

                <article>

                    <h3 class="quote">Cães Apadrinhados</h3>
                    <div id="ficha">
                        <img id="fotoDestaque" src="../img/caes/cao_padrinho.jpg">
                        <div id="dados">
                            <h2 id="nome"><?php echo $cao_13["nome"]; ?></h2>
                            <p>Gênero: <?php echo $cao_13["genero"]; ?></p>
                            <p>Idade: <?php echo $cao_13["idade"]; ?> Anos</p>
                            <p>Porte <?php echo $cao_13["porte"]; ?></p>
                        </div>
                    </div>
                    <div id="detalhes" class="quote">
                        <p>Data de Cadastro:11/02/2016</p>
                        <p>Data de Apadrinhamento: 23/03/2016</p>
                        <p><a class="links" href="AgendamentoPadrinho.php">Agendar visita</a></p>
                        <p><a class="links" href="PaginaDoacao.html">Fomas de Pagamento</a></p>
                        <p><a class="links" href="mailto:cuidadoresmelhoramg@gmail.com">Enviar um E-mail para cuidadores</a></p>
                    </div>
                </article>

                <table>
                    <thead>
                    <th colspan="5">Conheça alguns de nossos cãezinhos</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="itemLista">
                                 <a href="Ficha_Caes/Ficha_Cao_LOGIN_1.php">
                                    <img src="../img/caes/cao_01.jpg" alt="<?php echo $cao_1["nome"]; ?>" title="<?php echo $cao_1["nome"]; ?>" />
                                </a>
                            </td>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_5.php">
                                    <img src="../img/caes/cao_05.jpg" alt="<?php echo $cao_5["nome"]; ?>" title="<?php echo $cao_5["nome"]; ?>" />
                                </a>
                            </td>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_7.php">
                                    <img src="../img/caes/cao_07.jpg" alt="<?php echo $cao_7["nome"]; ?>" title="<?php echo $cao_7["nome"]; ?>" />
                                </a>
                            </td>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_9.php">
                                    <img src="../img/caes/cao_09.jpg" alt="<?php echo $cao_9["nome"]; ?>" title="<?php echo $cao_9["nome"]; ?>" />
                                </a>
                            </td>
                            <td class="itemLista">
                                <a href="Ficha_Caes/Ficha_Cao_LOGIN_10.php">
                                    <img src="../img/caes/cao_10.jpg" alt="<?php echo $cao_10["nome"]; ?>" title="<?php echo $cao_10["nome"]; ?>" />
                                </a>
                            </td>
                        </tr>

                    <td class="paginas" colspan="5">
                        <a href="CaesParaAdocao.php"> +Cãezinhos</a>
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
