<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        html, body{
            height: 100%;
            padding: 0;
            margin: 0;
        }
        
        main{
            display: flex;
            justify-content: center;
            align-items: center; 
            flex-direction: column;
        }

        header{
            padding: 10px;
            margin-bottom: 50px;
        }

        ul{
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            list-style: none;
            margin: 0;
        }

        li{
            display: flex;
            justify-content: center;
            align-items: center;
            width: 150px;
            height: 30px;
            border: 2px solid black;
            border-radius: 10px;
            background-color: white;
        }
            
        a{
            font-size: 1.2em;
            text-decoration: none;
            color: black;
        }

        table, th, td {
            margin: 50px;
            border:1px solid black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
<header>
        <ul>
            <li><a href = "incluir.php">Incluir</a></li>
            <li><a href = "alterar.php">Alterar</a></li>
            <li><a href = "excluir.php">Excluir</a></li>
            <li><a href = "listaTodos.php">Listar Todos</a></li>
            <li><a href = "listaUm.php">Listar Um</a></li>
        </ul>
    </header>
    <main>
        <form action="listaUm.php" method="POST">
            Pergunta: <input type="text" name="perg" required>
            <br><br>
            Resposta A: <input type="text" name="respA" required>
            <br><br>
            Resposta B: <input type="text" name="respB" required>
            <br><br>
            Resposta C: <input type="text" name="respC" required>
            <br><br>
            Resposta D: <input type="text" name="respD" required>
            <br><br>
            Gabarito:<br>  
            <input type="radio" id="respA" name="gab" value="A">
            <label for="respA">A</label><br>
            <input type="radio" id="respB" name="gab" value="B">
            <label for="respB">B</label><br>
            <input type="radio" id="respC" name="gab" value="C">
            <label for="respC">C</label><br>
            <input type="radio" id="respD" name="gab" value="D">
            <label for="respD">D</label><br>
            <input type="submit" value="Listar Pergunta" required>
        </form>

        <table>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                {
                    $arqDisc = fopen("Perguntas.txt","r") or die("erro ao criar arquivo");
                    
                    $linha = fgets($arqDisc);
                    $coluna = explode("|", $linha);
                    $perg = $_POST["perg"];
                    $respA = $_POST["respA"];
                    $respB = $_POST["respB"];
                    $respC = $_POST["respC"];
                    $respD = $_POST["respD"];
                    $gab = $_POST["gab"];

                    echo 
                    "<tr>
                    <td>" . $coluna[0] . "</td>
                    <td>" . $coluna[1] . "</td>
                    <td>" . $coluna[2] . "</td>
                    <td>" . $coluna[3] . "</td>
                    <td>" . $coluna[4] . "</td>
                    <td>" . $coluna[5] . "</td>
                    </tr>";
                    
                    while(!feof($arqDisc))
                    {   
                        $linha = fgets($arqDisc);
                        
                        $coluna = explode("|", $linha); //explode separa uma string em posicoes de um array separando por determinado delimitador
                        
                        if ((strcmp($perg, $coluna[0]) == 0) && (strcmp($respA, $coluna[1]) == 0) && 
                            (strcmp($respB, $coluna[2]) == 0) && (strcmp($respC, $coluna[3]) == 0) &&
                            (strcmp($respD, $coluna[4]) == 0) && (strcmp($gab, $coluna[5]) == 0))
                        {
                            echo 
                            "<tr>
                            <td>" . $coluna[0] . "</td>
                            <td>" . $coluna[1] . "</td>
                            <td>" . $coluna[2] . "</td>
                            <td>" . $coluna[3] . "</td>
                            <td>" . $coluna[4] . "</td>
                            <td>" . $coluna[5] . "</td>
                            </tr>";
                        }
                    }
                    
                    fclose($arqDisc);
                }
            ?>
        </table>
    </main>
</body>
</html>