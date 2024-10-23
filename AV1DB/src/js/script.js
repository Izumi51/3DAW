/*function enviarAlunos()
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
    // console.log("objForm2: " + objForm2);
    
    // console.log("JSON: " + objJson);
    // console.log("JSON: " + objJson2);

    let xmlhttp = new XMLHttpRequest();
    // console.log("1");

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou a resposta OK: " + this.responseText);
            // console.log("2");
            document.getElementById("msg").innerHTML = this.responseText;
        } else if (this.readyState < 4) {
                console.log("3: " + this.readyState);
            } else {
                console.log("Requisicao falhou: " + this.status);
            }
    }
    // console.log("4");
    xmlhttp.open("GET", "http://localhost/3DAW/AULA%207/exer1/incluir.php?&matri=" + matri + "&nome=" + nome + "&email=" + email);
    xmlhttp.send();
    // console.log("enviei form");
    // console.log("5");
}*/

function incluirUsuario() {
    let nome = document.getElementById("nome").value;
    let senha = document.getElementById("senha").value;
    let email = document.getElementById("email").value;

    let xmlhttp = new XMLHttpRequest();

    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou a resposta OK: " + this.responseText);
        } else if (this.readyState < 4) {
                console.log("3: " + this.readyState);
        } else {
            console.log("Requisicao falhou: " + this.status);
        }
    }

    // xmlhttp.open("GET", "http://localhost/3DAW/AV1DB/src/usuario/incluirUsuario.php?&senha=" + senha + "&nome=" + nome + "&email=" + email);
    // xmlhttp.send();
    xmlhttp.open("POST", "http://localhost/3DAW/AV1DB/src/usuario/incluirUsuario.php");
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("senha=" + senha + "&nome=" + nome + "&email=" + email);
            // xmlhttp.send();
            console.log("enviei form");
            console.log("5");
}

function alterarUsuario() {

}

function excluirUsuario() {

}

function lisTodosUsuario() {

}

function lisUmUsuario() {

}

function incluirPergunta() {
    
}

function alterarPergunta() {

}

function excluirPergunta() {

}

function lisTodosPergunta() {

}

function lisUmPergunta() {

}

function menuTest (type)
{
    switch (type) {
        case 1:
            displayReset();
            document.getElementById("1").style.display = "block";
            break;
        case 2:
            displayReset();
            document.getElementById("2").style.display = "block";
            break;
        case 3:
            displayReset();
            document.getElementById("3").style.display = "block";
            break;
        case 4:
            displayReset();
            document.getElementById("4").style.display = "block";
            break;
        case 5:
            displayReset();
            document.getElementById("5").style.display = "block";
            break;
        case 6:
            displayReset();
            document.getElementById("6").style.display = "block";
            break;
        case 7:
            displayReset();
            document.getElementById("7").style.display = "block";
            break;
        case 8:
            displayReset();
            document.getElementById("8").style.display = "block";
            break;
        case 9:
            displayReset();
            document.getElementById("9").style.display = "block";
            break;        
        case 10:
            displayReset();
            document.getElementById("10").style.display = "block";
            break;
    }
}

function displayReset() {
    for (var i = 1; i <= 10; i++) {
        var element = document.getElementById(i.toString());
        if (element) {
            element.style.display = 'none'; 
        }   
    }
}