<?php
    $servidor = "localhost"; 
    $user = "root";
    $senha = "";
    $database = "USUARIOSEPERGUNTAS";

    try ($conexao = new mysqli ($servidor, $user, $senha, $database)) 
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") 
        {
            $senha = $_GET["senha"];
            $nome = $_GET["nome"];
            $email = $_GET["email"];
            echo 
            $comando = "INSERT INTO `usuario` (`senha`, `nome`, `email`) VALUES (`"$senha . "`,`" . $nome . "`,`" . $email"`)";
            $resultado = $conexao->query ($comando);
        }
    } catch ($conexao->connect_error) 
    {  
        die ("Conexao Falhou!");
    }
?>