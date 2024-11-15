<?php
    $servidor = "localhost"; 
    $user = "root";
    $senha = "";
    $database = "usuarioseperguntas";

    $conexao = new mysqli ($servidor, $user, $senha, $database);

    if ($conexao->connect_error) {  
        die ("Conexao Falhou!");
    } else {   
        $comando = "SELECT * from `pergunta`";
        $resultado = $conexao->query($comando);

        $perguntas[] = array();
        $i = 0;
        While ($linha = $resultado->fetch_assoc()){
            $perguntas[$i] = $linha;
            $i++;
        }

        if ($resultado == true){
            $retorno=json_encode($perguntas);
        } else {
            $retorno=json_encode("erro");
        }

        echo $retorno;
    }
?>