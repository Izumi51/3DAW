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
            $pergunta = $_POST["questao"];
            $assunto = $_POST["assunto"];
            $tipo = $_POST["tipo"];
            $comando = "INSERT INTO `pergunta`  (`questao`, `tipo`, `assunto`)  VALUES ('" . $pergunta . "','" . $tipo . "','" . $assunto . "')";

            $resultado = $conexao->query ($comando);
        }
    }
?>