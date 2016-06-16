<?php
/*
 * TODOS OS DADOS AQUI GERADOS SÃO FICTÍCIOS
 * Este arquivo é de uma aplicação opensource para geração de boletos fictícios, chamada OpenBoleto.
 * Este foi adequado e adicionado ao projeto apenas para dar um ar mais profissional,
 * pois se aplica muito bem ao conceito de geração de boleto para doação.
 */

include ('../php_default/conexao_bd.php');
include ('../ferramentas_externas/openboleto/autoloader.php');

$id_usuario = $_POST['id_usuario'];
$valor = transformaValor($_POST['valor']);

$queryUsuario = "SELECT * FROM t_usuario, t_endereco WHERE t_usuario.id_usuario = '$id_usuario' AND t_endereco.id_usuario = '$id_usuario'";
$resultUsuario = mysqli_query($link, $queryUsuario);

while ($row = mysqli_fetch_assoc($resultUsuario)) {
    $nome = $row['nome'];
    $cpf = $row['cpf'];
    $rua = $row['rua'];
    $ncasa = $row['ncasa'];
    $complemento = $row['complemento'];
    $bairro = $row['bairro'];
    $cep = $row['cep'];
    $cidade = $row['cidade'];
    $estado = $row['estado'];
}

use OpenBoleto\Banco\BancoDoBrasil;
use OpenBoleto\Agente;

$sacado = new Agente("$nome", "$cpf", "$rua $ncasa $complemento, $bairro", "$cep", "$cidade", "$estado");
$cedente = new Agente('ONG Melhor Amigo', '02.123.123/0001-11', 'Av. Tancredo Neves 200, Cidade Universitária', '57073-383', 'Maceió', 'AL');

$boleto = new BancoDoBrasil(array(
    // Parâmetros obrigatórios
    'dataVencimento' => new DateTime(date('Y-m-d', strtotime("+3 days"))),
    'valor' => $valor,
    'sequencial' => 1234567, // Para gerar o nosso número
    'sacado' => $sacado,
    'cedente' => $cedente,
    'agencia' => 1234, // Até 4 dígitos     
    'carteira' => 18,
    'conta' => 9876543, // Até 8 dígitos
    'convenio' => 1234, // 4, 6 ou 7 dígitos 
));

echo $boleto->getOutput();

function transformaValor($valor_virgula) {
    $source = array('.', ',');
    $replace = array('', '.');

    $valor_ponto = str_replace($source, $replace, $valor_virgula); //Remove os pontos e substitui a virgula pelo ponto
    return $valor_ponto; //Retorna o valor formatado para gravar no banco
}