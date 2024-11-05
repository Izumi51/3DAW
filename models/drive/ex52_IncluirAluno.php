<?php
$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3dawmanha";
$conn = new mysqli($servidor,$username,$senha,$database);
if ($conn->connect_error) {
    die("Conexao falhou, avise o administrador do sistema");
}
$resultado = "";
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $matricula = $_GET["matricula"];
    $nome = $_GET["nome"];
    $email = $_GET["email"];
    $comandoSQL = "INSERT INTO `alunos`(`matricula`, `nome`, `email`) VALUES ('$matricula','$nome','$email')";
    $resultado = $conn->query($comandoSQL);

}
////  Vou escrever os dados do formulário em um arquivo de dados já existente
//    if (!file_exists("alunosNovos.txt")) {
//        $cabecalho = "nome;matricula;email\n";
//        file_put_contents("alunosNovos.txt", $cabecalho);
//    }
//    $txt = $nome . ";" . $matricula . ";" . $email . "\n";
//    file_put_contents("alunosNovos.txt", $txt, FILE_APPEND);
 //   echo "Aluno inserido com sucesso!" ;
$retorno = json_encode($resultado);
echo $retorno;

?>