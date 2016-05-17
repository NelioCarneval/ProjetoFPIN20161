<!DOCTYPE html>

<html>
    <head>
        <?php include('../php/DadosCadastrais.php'); ?>

        <meta charset="UTF-8">
        <title>Confirmação de Dados| Melhor Amigo</title>

        <link rel="stylesheet" type="text/css" href="../css/LayoutDefault.css">
        <link rel="stylesheet" type="text/css" href="../css/ConfirmacaoDados.css">
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
                <h3 class="center">Cadastro criado com sucesso! Aqui estão seus dados...</h3>

                <div id="dados">
                    <fieldset>
                        <legend><b>Dados Pessoais</b></legend>
                        <p>Nome Completo: <i><?php echo $nome; ?></i></p>
                        <p>Data de Nascimento: <i><?php echo $data; ?></i></p>
                        <p>CPF: <i><?php echo $cpf; ?></i></p>
                        <p>Telefone: <i><?php echo $telefone; ?></i></p>
                    </fieldset>
                    <fieldset>
                        <legend><b>Endereço</b></legend>
                        <p>CEP: <i><?php echo $cep; ?></i></p>
                        <p>Rua: <i><?php echo $rua; ?></i></p>
                        <p>Número: <i><?php echo $ncasa; ?></i></p>
                        <p>Bairro: <i><?php echo $bairro; ?></i></p>
                        <p>Complemento: <i><?php echo $complemento; ?></i></p>
                        <p>Cidade: <i><?php echo $cidade.", ".$estado ?></i></p>
                    </fieldset>
                    <p class="center"><a href="PaginaLogin.html"><button type="button">Concluir</button></a></p>
                </div>
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
