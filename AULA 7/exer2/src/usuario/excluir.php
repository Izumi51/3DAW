<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {  
        $arqVelho = fopen("Usuario.txt","r") or die("erro ao criar arquivo");
        $arqNovo = fopen("novosUsuario.txt","w") or die("erro ao criar arquivo");

        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        while(!feof($arqVelho))
        {   
            $linha = fgets($arqVelho);

            $coluna = explode(";", trim($linha)); // trim() para remover espaços em branco (as linhas estavam contando com o \n)

            if (($nome != $coluna[0]) && (strcmp($email, $coluna[1]) != 0) && ($senha != $coluna[2]))
            {
                fwrite($arqNovo,$linha);
            }
        }

        fclose($arqVelho);
        fclose($arqNovo);

        $arqVelho = fopen("Usuario.txt","w") or die("erro ao criar arquivo");
        $arqNovo = fopen("novosUsuario.txt","r") or die("erro ao criar arquivo");

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
        <title>Av1</title>
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
            <form action="excluir.php" method="POST">
                Nome: <input type="text" name="nome" required>
                <br><br>
                Email: <input type="text" name="email" required>
                <br><br>
                senha: <input type="password" name="senha" required>
                <br><br>
                <input type="submit" value="Excluir">
            </form>
        </main>
    </body>
</html>