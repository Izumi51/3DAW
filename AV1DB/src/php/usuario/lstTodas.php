<?php
    $servidor = "localhost"; 
    $user = "root";
    $senha = "";
    $database = "usuarioseperguntas";

    $conexao = new mysqli ($servidor, $user, $senha, $database);

    if ($conexao->connect_error) {  
        die ("Conexao Falhou!");
    } else {   
        $comando = "SELECT id, `nome`, `email` from `usuario`";
        $resultado = $conexao->query($comando);

        $usuarios[] = array();
        $i = 0;
        While ($linha = $resultado->fetch_assoc()){
            $usuarios[$i] = $linha;
            $i++;
        }

        if ($resultado == true){
            $retorno=json_encode($usuarios);
        } else {
            $retorno=json_encode("erro");
        }

        echo $retorno;
    }
?>