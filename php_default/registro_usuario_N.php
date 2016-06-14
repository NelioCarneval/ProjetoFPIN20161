<?php
if (verificaLogin()) {
    $queryUsuario = "SELECT * FROM t_usuario, t_endereco WHERE t_usuario.id_usuario = '$id_usuario_N' AND t_endereco.id_usuario = '$id_usuario_N'";
    $resultUsuario = mysqli_query($link, $queryUsuario);
    
    while ($row = mysqli_fetch_assoc($resultUsuario)) {
        $status_ban = $row['status_ban'];
        $nivel_usuario = $row['nivel_usuario'];
        $nome = $row['nome'];
        $cpf = $row['cpf'];
        $idade = $row['idade'];
        $telefone = $row['telefone'];
        $cep = $row['cep'];
        $rua = $row['rua'];
        $ncasa = $row['ncasa'];
        $bairro = $row['bairro'];
        $complemento = $row['complemento'];
        $cidade = $row['cidade'];
        $estado = $row['estado'];
        $email = $row['email'];
    }
}

function getNivel_usuario_N() {
    global $nivel_usuario;
    
    if (isset($nivel_usuario)) {
        return $nivel_usuario;
    }
}

function getStatus_ban_usuario_N() {
    global $status_ban;
    
    if (isset($status_ban)) {
        return $status_ban;
    }
}

function getNome_usuario_N() {
    global $nome;
    
    if (isset($nome)) {
        return $nome;
    }
}

function getCPF_usuario_N() {
    global $cpf;
    
    if (isset($cpf)) {
        return $cpf;
    }
}

function getIdade_usuario_N() {
    global $idade;
    
    if (isset($idade)) {
        return $idade;
    }
}

function getTelefone_usuario_N() {
    global $telefone;
    
    if (isset($telefone)) {
        return $telefone;
    }
}

function getCEP_usuario_N() {
    global $cep;
    
    if (isset($cep)) {
        return $cep;
    }
}

function getRua_usuario_N() {
    global $rua;
    
    if (isset($rua)) {
        return $rua;
    }
}

function getNCasa_usuario_N() {
    global $ncasa;
    
    if (isset($ncasa)) {
        return $ncasa;
    }
}

function getBairro_usuario_N() {
    global $bairro;
    
    if (isset($bairro)) {
        return $bairro;
    }
}

function getComplemento_usuario_N() {
    global $complemento;
    
    if (isset($complemento)) {
        return $complemento;
    }
}

function getCidade_usuario_N() {
    global $cidade;
    
    if (isset($cidade)) {
        return $cidade;
    }
}

function getEstado_usuario_N() {
    global $estado;
    
    if (isset($estado)) {
        return $estado;
    }
}

function getEmail_usuario_N() {
    global $email;
    
    if (isset($email)) {
        return $email;
    }
}