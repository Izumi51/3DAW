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

    xmlhttp.open("POST", "http://localhost/3DAW/AV1DB/src/usuario/incluirUsuario.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("senha=" + senha + "&nome=" + nome + "&email=" + email);
}

function alterarUsuario() {

}

function excluirUsuario() {

}

function lisTodosUsuario() {

}

function lisUmUsuario() {

}

function defPergTipo() {
    let tipo = document.getElementsByName("tipo");
    let formDis = document.getElementById("formDis");
    let formMult = document.getElementById("formMult");

    let i = 0;
    if (tipo[i].checked) {
        formMult.style.display = 'none';
        formDis.style.display = "block";
    } else {
        i++;
        if (tipo[i].checked) {
            formDis.style.display = 'none';
            formMult.style.display = "block";
        }
    }
}

function incluirPergunta(tipo) {
    if (tipo == 1)
    {
        
    }
    else {
        let questao = document.getElementById("pergunta");
        let opA = document.getElementById("respA");
        let opB = document.getElementById("respB");
        let opC = document.getElementById("respC");
        let opD = document.getElementById("respD");
        let assunto = document.getElementById("assunto");
        let gabValue;
        let gabOp = document.getElementsByName("gab");

        for (let i = 0; i < gabOp.length; i++) {
            if (gabOp[i].checked) {
                switch (i) {
                    case 0:
                        gabValue = 'A';
                        break;
                    case 1:
                        gabValue = 'B';
                        break;
                    case 2:
                        gabValue = 'C';
                        break;
                    case 3:
                        gabValue = 'D';
                        break;
                }
                break;
            }
        }

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
        
        xmlhttp.open("POST", "http://localhost/3DAW/AV1DB/src/pergunta/incluirPergunta.php");
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("questao=" + questao + "&opA=" + opA + "&opB=" + opB + "&opC=" + opC + "&opD=" + opD + "&assunto=" + assunto + "&tipo=" + tipo + "&gabarito=" + gabValue);
    }
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