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
    <table>
        <?php
            $arqDisc = fopen("disciplinas.txt","r") or die("erro ao criar arquivo");

            $linha = fgets($arqDisc);
            $coluna = explode(";", $linha);

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


                echo 
                "<tr>
                    <td>$coluna[0]</td>
                    <td>$coluna[1]</td>
                    <td>$coluna[2]</td>
                </tr>";
            }
                
            fclose($arqDisc);
        ?>
    </table>
</body>
</html>