<?php
    $servidor = "localhost"; 
    $user = "root";
    $senha = "";
    $database = "CRUDPERGUNTA";

    try ($conexao = new mysqli ($servidor, $user, $senha, $database)) {

        

    } catch ($conexao->) { 
        
        die ("Conexao Falhou!");

    }
?>