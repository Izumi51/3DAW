<?php
    $servidor = "localhost"; 
    $user = "root";
    $senha = "";
    $database = "usuarioseperguntas";

    $conexao = new mysqli ($servidor, $user, $senha, $database);

    if ($conexao->connect_error) {  
        die ("Conexao Falhou!");
    } else {   
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["id"];
            $comando = "DELETE FROM `usuario` WHERE `id` = " . $id;
            $resultado = $conexao->query($comando);
        }
    }
?>