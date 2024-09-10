<?php
            $arqDisc = fopen("disciplinas.txt","r") or die("erro ao criar arquivo");

            $linha = fgets($arqDisc);
            $coluna = explode(";", $linha);
            $Nome = $_POST["nome"];
            $Sigla = $_POST["sigla"];
            $Carga = $_POST["carga"];

            echo 
            "<tr>
                <th>$coluna[0]</th>
                <th>$coluna[1]</th>
                <th>$coluna[2]</th>
            </tr>";

            while(!feof($arqDisc))
            {   
                $linha = fgets($arqDisc);
        
                $coluna = explode(";", $linha); //explode separa uma string em posicoes de um array separando por determinado delimitador

                if (($Nome == $coluna[0]) && ($Sigla == $coluna[1]) && ($Carga == $coluna[2]))
                {
                    echo 
                    "<tr>
                    <td>$coluna[0]</td>
                    <td>$coluna[1]</td>
                    <td>$coluna[2]</td>
                    </tr>";
                }
            }
                
            fclose($arqDisc);
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            display: flex;
            justify-content: center;
            align-items: center; 
            flex-direction: column;
        }
        table, th, td {
            border:1px solid black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="listaUm.php" method="POST">
            Nome: <input type="text" name="nome">
            <br><br>
            Sigla: <input type="text" name="sigla">
            <br><br>
            Carga Horaria: <input type="text" name="carga">
            <br><br>
            <input type="submit" value="Criar Nova Disciplina">
    </form>

    <table>
        <?php
            echo 
                "<tr>
                <td>$coluna[0]</td>
                <td>$coluna[1]</td>
                <td>$coluna[2]</td>
                </tr>";
        ?>
    </table>
</body>
</html>