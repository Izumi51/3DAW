<?php
     $servidor = "localhost";
    $username = "root";
    $senha = "";
    $database = "faeterj3dawmanha";
    $conn = new mysqli($servidor,$username,$senha,$database);
    if ($conn->connect_error) {
       die("Conexao falhou, avise o administrador do sistema");
    }
   if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        $pergunta = $_POST["pergunta"];
        $tipo = $_POST["tipo"];
        $assunto = $_POST["assunto"];
        $msg = "";
        $comandoSQL = "INSERT INTO `Perguntas`(`pergunta`, `tipo`, `assunto`) VALUES ('" . 
            $pergunta . "'," . $tipo . ",'" . $assunto ."' )";
        $resultado = $conn->query($comandoSQL);
      // INSERT INTO `Perguntas`(`id`, `pergunta`, `tipo`, `assunto`) VALUES 
      // (1,'Quem Descobriu o Brasil?',1,'Historia');
      $msg = "Pergunta incluida com sucesso";
   
   if ($resultado=true){
      $retorno=json_encode($msg);
  } else {
      $retorno=json_encode("DEU RUIM!😭😭");
  }

  echo $retorno;
  }