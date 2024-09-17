<?php
    $msg = "";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        $nome = $_POST["nome"];
        $cpf = $_POST["cpf"];
        $matri = $_POST["matri"];
        $nasc = $_POST["nasc"];

        if (!file_exists("alunos.txt")){
            $arqAlunos = fopen("alunos.txt","w") or die("erro ao criar arquivo");
            $linha = "Nome;CPF;Matricula;Nascimento";
            fwrite($arqAlunos,$linha);
            fclose($arqAlunos);
        }
        
        // echo "nome: " . $nome . " sigla: " . " carga: " . $carga;
        $arqAlunos = fopen("alunos.txt","a") or die("erro ao criar arquivo");
        $linha = "\n" . $nome . ";" . $cpf . ";" . $matri . ";" . $nasc;
        fwrite($arqAlunos,$linha);
        fclose($arqAlunos);
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
            <h1>Adicionar Aluno</h1>

            <form action="incluir.php" method="POST">
                Nome: <input type="text" name="nome" required>
                <br><br>
                CPF: <input type="text" name="cpf" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" placeholder="nnn.nnn.nnn-nn" required>
                <br><br>
                Matrícula: <input type="text" name="matri" required>
                <br><br>
                Data de Nascimento: <input type="text" name="nasc" pattern="\d{2}\/\d{2}\/\d{4}" placeholder="dd/mm/aaaa" required>
                <br><br>
                <input type="submit" value="Adicionar Aluno" required>
            </form>
            <p><?php echo $msg ?></p><br>
        </main>
    </body>
</html>