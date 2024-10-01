<?php
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $matricula = $_GET["matri"];
        $nome = $_GET["nome"];
        $email = $_GET["email"];

        if (!file_exists("alunos.txt")) {
            $arqDisc = fopen("alunos.txt","w") or die("erro ao criar arquivo");
            $linha = "matricula;nome;email\n";
            fwrite($arqDisc,$linha);
            fclose($arqDisc);
        }

        $arqDisc = fopen("alunos.txt","a") or die("erro ao abrir arquivo");

        $linha = $matricula . ";" . $nome . ";" . $email . "\n";
        fwrite($arqDisc,$linha);
        fclose($arqDisc);    
    }
?>