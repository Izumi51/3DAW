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
            Nome: <input type="text" name="nome" required>
            <br><br>
            Email: <input type="text" name="email" required>
            <br><br>
            senha: <input type="password" name="senha" required>
            <br><br>
            <input type="submit" value="Listar Usuario" required>
        </form>

        <table>
            <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") 
                {
                    $arqDisc = fopen("Usuario.txt","r") or die("erro ao criar arquivo");
                    
                    $linha = fgets($arqDisc);
                    $coluna = explode(";", $linha);
                    $nome = $_POST["nome"];
                    $email = $_POST["email"];
                    $senha = $_POST["senha"];

                    echo 
                    "<tr>
                    <td>" . $coluna[0] . "</td>
                    <td>" . $coluna[1] . "</td>
                    <td>" . $coluna[2] . "</td>
                    </tr>";
                    
                    while(!feof($arqDisc))
                    {   
                        $linha = fgets($arqDisc);
                        
                        $coluna = explode(";", $linha); //explode separa uma string em posicoes de um array separando por determinado delimitador
                        
                        if (($nome == $coluna[0]) && (strcmp($email, $coluna[1]) == 0) && ($senha == $coluna[2]))
                        {
                            echo 
                            "<tr>
                            <td>" . $coluna[0] . "</td>
                            <td>" . $coluna[1] . "</td>
                            <td>" . $coluna[2] . "</td>
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