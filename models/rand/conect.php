<?php
    $servidor = "localhost"; 
    $user = "root";
    $senha = "";
    $database = "CRUDPERGUNTA";
    
    $conexao = new mysqli ($servidor, $user, $senha, $database);
    
    if ($conexao->connect_error) {  
        // ...
    } else {
        die ("Conexao falhou!!");
    }
?>