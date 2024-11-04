function incluir() {
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

    xmlhttp.open("POST", "http://localhost/3DAW/aulaOnline8/actphp/incluir.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("questao=" + questao + "&assunto=" + assunto + "&tipo=" + tipo);
}

function alterar() {

}

function excluir() {

}

function lstTodas() {

}

function lstUm() {

}

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
    }
}

function displayReset() {
    for (var i = 1; i <= 5; i++) {
        var element = document.getElementById(i.toString());
        if (element) {
            element.style.display = 'none'; 
        }   
    }
}