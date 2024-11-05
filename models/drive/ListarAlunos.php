<?php
    // $servidor = "localhost";
    // $username = "root";
    // $senha = "";
    // $database = "faeterj3dawmanha";
    // $conn = new mysqli($servidor,$username,$senha,$database);
    // if ($conn->connect_error) {
    //    die("Conexao falhou, avise o administrador do sistema");
    // }
    // $comandoSQL = "SELECT * from `Perguntas`";
    // $resultado = $conn->query($comandoSQL);

    $arqDisc = fopen("alunos.txt","r") or die("erro ao abrir arquivo");
    $arrAluno[] = array();
        $i = 0;
        $strJson = "{ 'Alunos' : [";
        $linha = fgets($arqDisc);
        $linha = fgets($arqDisc);
    while(!feof($arqDisc)) {
    //     $linha = fgets($arqDisc);
         $colunaDados = explode(";", $linha);
         $strJson = $strJson . "{ 'matricula' : '" . $colunaDados[0] . "'," .
             "'nome' : '" . $colunaDados[1] . "'," .
             "'email' : '" . trim($colunaDados[2]) . "' },";
             $linha = fgets($arqDisc);
    }
//     $fim = $strJson.count-1;
     $strJson = substr($strJson, 0, strlen($strJson) - 1);
     $strJson = $strJson . "]}";
 //    $strJson = $strJson.substr($strJson, $strJson.count-1) . "]}";
     
//     While ($linha = $resultado->fetch_assoc()){
//         $arrPerguntas[$i] = $linha;
//         $i++;
//     }
// //        echo $result;
//        echo $sql;
    // if ($resultado=true){
    //     $retorno=json_encode($arrPerguntas);
    // } else {
    //     $retorno=json_encode("DEU RUIM!😭😭");
    // }

    // echo $retorno;
    $retorno=json_encode($strJson);
  //  echo $strJson;
    echo $retorno;
?>