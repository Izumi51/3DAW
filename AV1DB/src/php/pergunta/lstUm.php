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

            $comando = "SELECT * from `pergunta` WHERE id = " . $id;

            $resultado = $conexao->query($comando);
            $pergunta = $resultado->fetch_assoc();

            if ($resultado==true){
                $jpergunta = json_encode($pergunta);
            } else {
                $jpergunta = json_encode("erro");
            }

            echo $jpergunta;
        }
        else {
            echo "erro";
        }
    }
?>