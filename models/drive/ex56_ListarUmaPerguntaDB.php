<?php
    $idPerg = $_GET["idPerg"];
    $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "faeterj3dawmanha";

    $conn = new mysqli($servidor,$username,$senha,$database);

    if ($conn->connect_error) {
       die("Conexao falhou, avise o administrador do sistema");
    }

    $comandoSQL = "SELECT * from `Perguntas` where id = $idPerg";
    
    $resultado = $conn->query($comandoSQL);

    $jPerguntas = json_encode($resultado->fetch_assoc(), JSON_UNESCAPED_UNICODE);

    echo $jPerguntas;
?>