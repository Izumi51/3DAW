<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {    
        $arqVelho = fopen("alunos.txt","r") or die("erro ao criar arquivo");
        $arqNovo = fopen("novosAlunos.txt","w") or die("erro ao criar arquivo");

        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $matri = $_POST["matri"];
        $nasc = $_POST["nasc"];
        $novonome = $_POST["novonome"];
        $novocpf = $_POST["novocpf"];
        $novamatri = $_POST["novamatri"];
        $novanasc = $_POST["novanasc"];

        while (!feof($arqVelho)) 
        {
            $linha = fgets($arqVelho);
            $coluna = explode(";", trim($linha)); // trim() para remover espaços em branco (as linhas estavam contando com o \n)

            if (($nome == $coluna[0]) && (strcmp($cpf, $coluna[1]) == 0) && ($matri == $coluna[2]) && (strcmp($nasc, $coluna[3]) == 0))
            {
                $linha = $novonome . ";" . $novocpf . ";" . $novamatri . ";" . $novanasc;
            }

            fwrite($arqNovo, $linha);
        }

        fclose($arqVelho);
        fclose($arqNovo);

        $arqVelho = fopen("alunos.txt","w") or die("erro ao criar arquivo");
        $arqNovo = fopen("novosAlunos.txt","r") or die("erro ao criar arquivo");

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
                background-color: lightblue;
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
                Nome: <input type="text" name="nome" required>
                <br><br>
                CPF: <input type="text" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="nnn.nnn.nnn-nn" required>
                <br><br>
                Matrícula: <input type="text" name="matri" required>
                <br><br>
                Data de Nascimento: <input type="text" name="nasc" pattern="\d{2}\/\d{2}\/\d{4}" placeholder="dd/mm/aaaa" required>
                <br><br>
                Novo Nome: <input type="text" name="novonome" required>
                <br><br>
                Novo CPF: <input type="text" name="novocpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="nnn.nnn.nnn-nn" required>
                <br><br>
                Nova Matrícula: <input type="text" name="novamatri" required>
                <br><br>
                Nova Data de Nascimento: <input type="text" name="novanasc" pattern="\d{2}\/\d{2}\/\d{4}" placeholder="dd/mm/aaaa" required>
                <br><br>
                <br><br>
                <input type="submit" value="Alterar">
            </form>
        </main>
    </body>
</html>