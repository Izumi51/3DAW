<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {    
        $arqVelho = fopen("Perguntas.txt","r") or die("erro ao criar arquivo");
        $arqNovo = fopen("novosPerguntas.txt","w") or die("erro ao criar arquivo");

        $perg = $_POST["perg"];
        $respA = $_POST["respA"];
        $respB = $_POST["respB"];
        $respC = $_POST["respC"];
        $respD = $_POST["respD"];
        $gab = $_POST["gab"];
        $novaperg = $_POST["novaperg"];
        $novarespA = $_POST["novarespA"];
        $novarespB = $_POST["novarespB"];
        $novarespC = $_POST["novarespC"];
        $novarespD = $_POST["novarespD"];
        $novogab = $_POST["gab"];

        while (!feof($arqVelho)) 
        {
            $linha = fgets($arqVelho);
            $coluna = explode("|", trim($linha)); // trim() para remover espaços em branco (as linhas estavam contando com o \n)

            if ((strcmp($perg, $coluna[0]) == 0) && (strcmp($respA, $coluna[1]) == 0) && 
                (strcmp($respB, $coluna[2]) == 0) && (strcmp($respC, $coluna[3]) == 0) &&
                (strcmp($respD, $coluna[4]) == 0) && (strcmp($gab, $coluna[5]) == 0))
            {
                $linha = $novaperg . "|" . $novarespA . "|" . $novarespB . "|" . $novarespC . "|" . $novarespD . "|" . $novogab;
            }

            fwrite($arqNovo, $linha);
        }

        fclose($arqVelho);
        fclose($arqNovo);

        $arqVelho = fopen("Perguntas.txt","w") or die("erro ao criar arquivo");
        $arqNovo = fopen("novosPerguntas.txt","r") or die("erro ao criar arquivo");

        while(!feof($arqNovo))
        {   
            $linha = fgets($arqNovo);
            fwrite($arqVelho,$linha);
        }

        fclose($arqVelho);
        fclose($arqNovo);
    }
?>

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
            <form action="alterar.php" method="POST">
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

                <br>
                
                Nova Pergunta: <input type="text" name="novaperg" required>
                <br><br>
                Nova Resposta A: <input type="text" name="novarespA" required>
                <br><br>
                Nova Resposta B: <input type="text" name="novarespB" required>
                <br><br>
                Nova Resposta C: <input type="text" name="novarespC" required>
                <br><br>
                Nova Resposta D: <input type="text" name="novarespD" required>
                <br><br>
                Novo Gabarito:<br>  
                <input type="radio" id="respA" name="novogab" value="A">
                <label for="respA">A</label><br>
                <input type="radio" id="respB" name="novogab" value="B">
                <label for="respB">B</label><br>
                <input type="radio" id="respC" name="novogab" value="C">
                <label for="respC">C</label><br>
                <input type="radio" id="respD" name="novogab" value="D">
                <label for="respD">D</label><br>

                <input type="submit" value="Alterar">
            </form>
        </main>
    </body>
</html>