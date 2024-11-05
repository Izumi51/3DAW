<?php
    $servidor = "localhost"; 
    $user = "root";
    $senha = "";
    $database = "perguntas";

    $conexao = new mysqli ($servidor, $user, $senha, $database);

    if ($conexao->connect_error) {  
        die ("Conexao Falhou!");
    } else {   
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $comando = "INSERT INTO `usuario`  (`nome`, `email`, `senha`)  VALUES ('" . $nome . "','" . $email . "','" . $senha . "')";

            $resultado = $conexao->query ($comando);
        }
    }
?>