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

            $comando = "SELECT * from `usuario` WHERE id = " . $id;

            $resultado = $conexao->query($comando);
            $usuario = $resultado->fetch_assoc();

            if ($resultado==true){
                $jUsuario = json_encode($usuario);
            } else {
                $jUsuario = json_encode("erro");
            }

            echo $jUsuario;
        }
        else {
            echo "erro";
        }
    }
?>