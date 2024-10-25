<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $database = "usuarioseperguntas";

    $conexao = new mysqli ($servidor, $usuario, $senha, $database);

    if ($conexao->connect_error) {
        die ("Conexao falhou!!!");
    } else {   
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $questao = $_POST("questao");
            $tipo = $_POST("tipo");
            $assunto = $_POST("assunto");
            $opA = $_POST("opA");
            $opB = $_POST("opB");
            $opC = $_POST("opC");
            $opD = $_POST("opD");
            $gabarito = $_POST("gabarito");

            echo $merda;

            $comando = "INSERT INTO `pergunta`  (`questao`, `tipo`, `assunto`) 
                            VALUES ('" . $questao . "','" . $tipo . "','" . $assunto . "')"
            .          "INSERT INTO `resposta`  (`opA`, `opB`, `opC`, `opD`, `gabarito`) 
                            VALUES ('" . $opA . "','" . $opB . "','" . $opC . "','" . $opD . "','" . $gabrito ."')";

            $resultado = $conexao->query ($comando);
        }
    }
?>