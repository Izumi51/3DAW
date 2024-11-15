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
            $questao = $_POST["questao"]; 
            $opA = $_POST["opA"]; 
            $opB = $_POST["opB"]; 
            $opC = $_POST["opC"]; 
            $opD = $_POST["opD"]; 
            $gabValue = $_POST["gabValue"];
 
            $comando = "UPDATE `pergunta` 
                        SET `questao` = '" . $questao . "', `gabarito` = '" . $gabValue .  "', `opA` = '" . $opA . "', `opB` = '" . $opB . "', `opC` = '" . $opC . "', `opD` = '" . $opD ."' 
                        WHERE `id` = '" . $id . "'";
            $resultado = $conexao->query ($comando);
        }
    }
?>