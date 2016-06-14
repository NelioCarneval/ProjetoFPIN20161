<?php

$link = @mysqli_connect('localhost:3306', 'root', '');
if (!$link) {
    die('Não foi possível conectar com o BD: ' . mysqli_connect_error());
}

$db_selected = @mysqli_select_db($link, melhor_amigo);
if (!$db_selected) {
    die('Não foi possivel selecionar o esquema: ' . mysqli_error($link));
}

mysqli_query($link, "SET NAMES 'utf8'");
mysqli_query($link, 'SET character_set_connection=utf8');
mysqli_query($link, 'SET character_set_client=utf8');
mysqli_query($link, 'SET character_set_results=utf8');

//Deixar comentada... Só está aqui pra ajudar em verificar coisas durante a implementação
/*
$query = "select * from t_usuario";
$resultado = mysqli_query($link, $query);

while ($row = mysqli_fetch_assoc($resultado)) {
    echo $row['id_usuario'] . "<br>";
    echo $row['nome'] . "<br>";
    echo $row['email'] . "<br>";
    echo $row['senha'] . "<br>";
    echo $row['cpf'] . "<br>";
    echo $row['idade'] . "<br>";
    echo $row['telefone'] . "<br><br>";
}
*/