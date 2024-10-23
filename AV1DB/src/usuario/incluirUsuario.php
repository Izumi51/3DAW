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
            $senha = $_POST["senha"];
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $comando = "INSERT INTO `usuario`  (`senha`, `nome`, `email`)      VALUES ('" . $senha . "','" . $nome . "','" . $email . "')";
            // "INSERT INTO `Perguntas`(`pergunta`, `tipo`, `assunto`) VALUES ('" . $pergunta . "'," . $tipo . ",'" . $assunto ."' )";
            $resultado = $conexao->query ($comando);
        }
    }
?>