<?php
    $msg = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];

        if (!file_exists("Usuario.txt")){
            $arqUsuario = fopen("Usuario.txt","w") or die("erro ao criar arquivo");
            $linha = "Nome;Email;Senha";
            fwrite($arqUsuario,$linha);
            fclose($arqUsuario);
        }
        
        $arqUsuario = fopen("Usuario.txt","a") or die("erro ao criar arquivo");
        $linha = "\n" . $nome . ";" . $email . ";" . $senha;
        fwrite($arqUsuario,$linha);
        fclose($arqUsuario);
        $msg = "Deu tudo certo!!!";
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
            <h1>Adicionar Usuário</h1>

            <form action="incluir.php" method="POST">
                Nome: <input type="text" name="nome" required>
                <br><br>
                Email: <input type="text" name="email" required>
                <br><br>
                senha: <input type="password" name="senha" required>
                <br><br>
                <input type="submit" value="Incluir Usuário" required>
            </form>
            <p><?php echo $msg ?></p><br>
        </main>
    </body>
</html>