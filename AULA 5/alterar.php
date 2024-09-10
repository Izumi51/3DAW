<?php
    $arqVelho = fopen("disciplinas.txt","r") or die("erro ao criar arquivo");
    $arqNovo = fopen("novoDisciplinas.txt","w") or die("erro ao criar arquivo");

    $Nome = $_POST["nome"];
    $Sigla = $_POST["sigla"];
    $Carga = $_POST["carga"];
    $novoNome  = $_POST["novonome"];
    $novoSigla = $_POST["novosigla"];
    $novoCarga = $_POST["novocarga"];

    while(!feof($arqVelho))
    {   
        $linha = fgets($arqVelho);

        $coluna = explode(";", $linha); //explode separa uma string em posicoes de um array separando por determinado delimitador

        if (($Nome == $coluna[0]) && ($Sigla == $coluna[1]) && ($Carga == $coluna[2]))
        {
            $linha = $novoNome . ";" . $novoSigla . ";" . $novoCarga . "\n";
        }
        fwrite($arqNovo,$linha);
    }

    fclose($arqVelho);
    fclose($arqNovo);

    // $arqVelho = fopen("disciplinas.txt","w") or die("erro ao criar arquivo");
    // $arqNovo = fopen("novoDisciplinas.txt","r") or die("erro ao criar arquivo");

    // while(!feof($arqNovo))
    // {   
    //     $linha = fgets($arqNovo);
    //     $coluna = explode(";", $linha); //explode separa uma string em posicoes de um array separando por determinado delimitador
    //     fwrite($arqVelho,$linha);
    // }

    // fclose($arqVelho);
    // fclose($arqNovo);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="alterar.php" method="POST">
            Nome: <input type="text" name="nome">
            <br><br>
            Sigla: <input type="text" name="sigla">
            <br><br>
            Carga Horaria: <input type="text" name="carga">
            <br><br>
            Novo Nome: <input type="text" name="novonome">
            <br><br>
            Nova Sigla: <input type="text" name="novosigla">
            <br><br>
            Nova Carga Horaria: <input type="text" name="novocarga">
            <br><br>
            <input type="submit" value="Criar Nova Disciplina">
    </form>
</body>
</html>