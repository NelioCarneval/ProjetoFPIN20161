<?php

include ('conexao_bd.php');

$queryCaes = "select * from t_cao";
$resultCaes = mysqli_query($link, $queryCaes);

$num_caes = 0;
$num_caes_disponiveis = 0;
$maior_id = 1;

while ($row = mysqli_fetch_assoc($resultCaes)) {
    $num_caes++;
    
    $id = $row['id_cao'];
    $nome = $row['nome'];
    $genero = $row['genero'];
    $idade = $row['idade'];
    $porte = $row['porte'];
    $status_disponivel = (bool)$row['status_disponivel'];
    $src_imagem = $row['src_imagem'];
    
    $cao[$id]["id_cao"] = $id;
    $cao[$id]["nome"] = $nome;
    $cao[$id]["genero"] = $genero;
    $cao[$id]["idade"] = $idade;
    $cao[$id]["porte"] = $porte;
    $cao[$id]["status_disponivel"] = $status_disponivel;
    $cao[$id]["src_imagem"] = $src_imagem;
    
    if($cao[$id]["status_disponivel"]){
        $num_caes_disponiveis++;
    }
    
    if($id > $maior_id){
        $maior_id = $id;
    }
}

function getId_cao($id) {
    global $cao;
    return $cao[$id]["id_cao"];
}

function getNome_cao($id) {
    global $cao;
    return $cao[$id]["nome"];
}

function getGenero_cao($id) {
    global $cao;
    return $cao[$id]["genero"];
}

function getIdade_cao($id) {
    global $cao;
    return $cao[$id]["idade"];
}

function getPorte_cao($id) {
    global $cao;
    return $cao[$id]["porte"];
}

function getStatus_disponivel_cao($id) {
    global $cao;
    return $cao[$id]["status_disponivel"];
}

function getSrc_imagem_cao($id) {
    global $cao;
    return $cao[$id]["src_imagem"];
}