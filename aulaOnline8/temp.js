/*Scripts para as PERGUNTAS*/
function incluirPergunta() {
    let questao = document.getElementById("pergunta").value;
    let tipo = document.getElementById("tipo").value;
    let assunto = document.getElementById("assunto").value;
    
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

    xmlhttp.open("POST", "http://localhost/3DAW/aulaOnline8/actphp/pergunta/incluir.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("questao=" + questao + "&assunto=" + assunto + "&tipo=" + tipo);
}

function alterarPergunta() {

}

function excluirPergunta() {

}

function lstTodasPerguntas() {

}

function lstUmaPergunta() {

}

/*Scripts para o USUARIO*/
function incluirUsuario() {
    let nome = document.getElementById("nome").value;
    let email= document.getElementById("email").value;
    let senha= document.getElementById("senha").value;
    
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

    xmlhttp.open("POST", "http://localhost/3DAW/aulaOnline8/actphp/usuario/incluir.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("nome=" + nome + "&email=" + email + "&senha=" + senha);
}

function alterarUsuario() {

}

function excluirUsuario() {
    let excUsua = document.getElementById("excUsua").value;
    
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
    
    xmlhttp.open("POST", "http://localhost/3DAW/aulaOnline8/actphp/usuario/excluir.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("excUsua=" + excUsua);
}

function lstTodosUsuarios() {

}

function lstUmUsuario() {

}

/*Scripts para a VISIBILIDADE*/
function menuTest(type) {
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