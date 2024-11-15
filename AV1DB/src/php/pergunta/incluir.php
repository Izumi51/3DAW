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
            $questao = $_POST["questao"]; 
            $opA = $_POST["opA"]; 
            $opB = $_POST["opB"]; 
            $opC = $_POST["opC"]; 
            $opD = $_POST["opD"]; 
            $gabValue = $_POST["gabValue"];
        
            $comando = "INSERT INTO `pergunta`  (`questao`, `gabarito`, `opA`, `opB`, `opC`, `opD`)  
                        VALUES ('" . $questao . "','" . $gabValue . "','" . $opA . "','" . $opB . "','" . $opC . "','" . $opD . "')";
            $resultado = $conexao->query ($comando);
        }
    }
?>