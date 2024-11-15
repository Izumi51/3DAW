<?php
    $msg = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        $perg = $_POST["perg"];
        $respA = $_POST["respA"];
        $respB = $_POST["respB"];
        $respC = $_POST["respC"];
        $respD = $_POST["respD"];
        $gab = $_POST["gab"];

        if (!file_exists("Perguntas.txt")){
            $arqPerguntas = fopen("Perguntas.txt","w") or die("erro ao criar arquivo");
            $linha = "pergunta|respostaA|respostaB|respostaC|respostaD|gabarito";
            fwrite($arqPerguntas,$linha);
            fclose($arqPerguntas);
        }
        
        // echo "perg: " . $perg . " sigla: " . " carga: " . $carga;
        $arqPerguntas = fopen("Perguntas.txt","a") or die("erro ao criar arquivo");
        $linha = "\n" . $perg . "|" . $respA . "|" . $respB ."|" . $respC ."|" . $respD ."|" . $gab;
        fwrite($arqPerguntas,$linha);
        fclose($arqPerguntas);
        $msg = "Deu tudo certo!!!";
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
            <h1>Adicionar Perguntas</h1>

            <form action="incluir.php" method="POST">
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

                <input type="submit" value="Adicionar Perguntas" required>
            </form>
            <p><?php echo $msg ?></p><br>
        </main>
    </body>
</html>