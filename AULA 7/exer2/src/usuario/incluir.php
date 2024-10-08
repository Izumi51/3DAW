<?php
    if ($_SERVER['REQUEST_METHOD'] == 'GET')  {
        $nome = $_GET["nome"];
        $email = $_GET["email"];
        $senha = $_GET["senha"];

        if (!file_exists("Usuario.txt")){
            $arqUsuario = fopen("Usuario.txt","w") or die("erro ao criar arquivo");
            $linha = "Nome;Email;Senha";
            fwrite($arqUsuario,$linha);
            fclose($arqUsuario);
        }
        
        $arqUsuario = fopen("Usuario.txt","a") or die("erro ao criar arquivo");
        $linha = "\n" . $nome . ";" . $email . ";" . $senha;
        fwrite($arqUsuario,$linha);
        fclose($arqUsuario);
    }
?>