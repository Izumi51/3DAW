function enviarAlunos()
{
    let formCad = document.getElementById("formCadastro");
    // console.log(formCad);
    let nome = document.getElementById  ("nome").value;
    // console.log(nome);
    let matri = document.getElementById("matri").value;
    // console.log(matri);
    let email = document.getElementById("email").value;
    // console.log(email);

    let objForm2 = {"matricula": matri,"nome":nome,"email":email};
    let objJson = JSON.stringify(formCad);
    let objJson2 = JSON.stringify(objForm2);
    console.log("objForm2: " + objForm2);
    
    console.log("JSON: " + objJson);
    console.log("JSON: " + objJson2);

    let xmlhttp = new XMLHttpRequest();
console.log("1");

xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        console.log("Chegou a resposta OK: " + this.responseText);
        console.log("2");
        document.getElementById("msg").innerHTML = this.responseText;
    } else if (this.readyState < 4) {
            console.log("3: " + this.readyState);
        } else {
            console.log("Requisicao falhou: " + this.status);
        }
}
console.log("4");
xmlhttp.open("GET", "http://localhost/3daw/IncluirAluno.php?matricula=" + matri + "&nome=" + nome + "&email=" + email);
xmlhttp.send();
console.log("enviei form");
console.log("5");
}

function ValidaForm(pmatri, pnome, pemail) {
    let msg = "";
    if (pmatri == "") 
        msg = "matricula não preenchida. <br>";

    return msg;
}
