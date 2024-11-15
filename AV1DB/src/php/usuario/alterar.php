<?php
    $servidor = "localhost"; 
    $user = "root";
    $senha = "";
    $database = "usuarioseperguntas";

    $conexao = new mysqli ($servidor, $user, $senha, $database);

    if ($conexao->connect_error) {  
        die ("Conexao Falhou!");
    } else {   
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $id = $_POST["id"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];

            $comando = "UPDATE `usuario` SET `email` = '" . $email . "', `senha` = '" . $senha . "' WHERE `id` = '" . $id . "'";
            $resultado = $conexao->query ($comando);
        }
    }
?>