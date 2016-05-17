<!DOCTYPE html>

<html>
    <head>
        <?php include('../../php/Cadastro_Caes.php'); ?>

        <meta charset="UTF-8">
        <title><?php echo $cao_3["nome"]; ?> | Melhor Amigo</title>

        <link rel="stylesheet" type="text/css" href="../../css/LayoutDefault.css">
        <link rel="stylesheet" type="text/css" href="../../css/Ficha.css">
        <link rel="stylesheet" type="text/css" href="../../css/Ficha_LOGIN.css">
    </head>

    <body>
        <div id="total">
            <p><a href="../../index.html"><img id="logoPrincipal" src="../../img/logo_melhor_amigo.png"></a></p>

            <header>
                <nav>
                    <p><a href="../CaesParaAdocao.php">Adoções</a><a href="../PaginaPadrinho.php">Apadrinhamento</a><a href="../PaginaDoacao.html">Doações</a><a href="../Voluntario_LOGIN.html">Voluntários</a><a href="../PaginaLogin.html">Entrar</a><a href="../FormularioDeCadastro2.html">Cadastre-se</a></p>
                </nav>
            </header>

            <div id="conteudo">
                <p><a class="subnav" href="../CaesParaAdocao.php">Cães para adoção</a> / <a class="subnav" href="#"><?php echo $cao_3["nome"]; ?></a></p>

                <div id="ficha">
                    <img id="fotoDestaque" src="../../img/caes/cao_03.jpg">
                    <div id="dados">
                        <h2 id="nome"><?php echo $cao_3["nome"]; ?></h2>
                        <p>Gênero: <?php echo $cao_3["genero"]; ?></p>
                        <p>Idade: <?php echo $cao_3["idade"]; ?> Anos</p>
                        <p>Porte <?php echo $cao_3["porte"]; ?></p>
                    </div>
                </div>

                <div id="regras">
                    <h4>DOCUMENTAÇÃO NECESSÁRIA:</h4>
                    <p>Para adotar você precisa ser maior de 18 anos.</p>
                    <p>Apresentar documentos originais de RG e CPF, além de comprovante de endereço. Deverá assinar também um termo de adoção se responsabilizando pelo animal por tempo indeterminado, ou seja, até o fim da vida.</p>
                    <p>Caso o animal não se adapte, ele deverá ser devolvido para a nossa ONG.</p>
                    <p>Para adotar um de nosso animais, o adotante terá que se submeter à uma entrevista e conseguir aprovação.</p>
                </div>

                <p class="center">Por favor, faça o <a href="#login">login</a> abaixo ou <a href="../FormularioDeCadastro2.html" target="_BLANK">cadastre-se</a>, para ter acesso à ficha de proposta de adoção.</p>

                <div id="login">
                    <form method="post" action="Ficha_Cao_PROPOSTA_3.php#proposta">
                        <p><input type="text" name="email" placeholder="Email de cadastro"></p>
                        <p><input type="password" name="senha" placeholder="Senha"></p>
                        <p><input type="submit" name="entrar" value="Entrar"></p>
                    </form>

                    <div id="ajuda">
                        <p><a href="../esqueciAsenha_INFORMAR.html" target="_BLANK">Esqueci a senha</a> | <a href="../FormularioDeCadastro2.html" target="_BLANK">Cadastre-se</a></p>
                    </div>
                </div>
            </div>

            <footer>
                <nav>
                    <p>
                        <a href="../SobreNos.html">Sobre</a>
                        <a href="../../index.html">Início</a>
                        <a href="../LocalizacaoDaONG.html">Localização</a>
                    </p>
                </nav>
            </footer>

        </div>
    </body>