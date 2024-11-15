// usuarios
function incluirUsuario() {
    let nome = document.getElementById("nome").value;
    let senha = document.getElementById("senha").value;
    let email = document.getElementById("email").value;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou a resposta OK: " + this.responseText);
        } else
        if (this.readyState < 4) {
            console.log("3: " + this.readyState);
        } else
            console.log("Requisicao falhou: " + this.status);
    }

    xmlhttp.open("POST", "http://localhost/3DAW/AV1DB/src/php/usuario/incluir.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("nome=" + nome + "&senha=" + senha + "&email=" + email);
}

function alterarUsuario() {
    let id = document.getElementById("numUsua").value;
    let email = document.getElementById("novoEmail").value;
    let senha = document.getElementById("novaSenha").value;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou a resposta OK: " + this.responseText);
        } else
        if (this.readyState < 4) {
            console.log("3: " + this.readyState);
        } else
            console.log("Requisicao falhou: " + this.status);
    }

    xmlhttp.open("POST", "http://localhost/3DAW/AV1DB/src/php/usuario/alterar.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + id + "&email=" + email + "&senha=" + senha);
}

function excluirUsuario() {
    let id = document.getElementById("excUsua").value;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou a resposta OK: " + this.responseText);
        } else
        if (this.readyState < 4) {
            console.log("3: " + this.readyState);
        } else
            console.log("Requisicao falhou: " + this.status);
    }

    xmlhttp.open("POST", "http://localhost/3DAW/AV1DB/src/php/usuario/excluir.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + id);
}

function lisUmUsuario() {
    let id = document.getElementById("lstUsua").value;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                document.getElementById("tabela-usuario").innerHTML = "";
                const objReturnJSON = JSON.parse(this.responseText);
                CriarLinhaTabelaUsuario(objReturnJSON, "tabela-usuario");
            } else {
                console.log("Requisição falhou: " + this.status);
            }
        }
    };

    xmlhttp.open("POST", "http://localhost/3DAW/AV1DB/src/php/usuario/lstUm.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + id);
}

function lisTodosUsuario() {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                document.getElementById("tabela-usuarios").innerHTML = "";
                const objReturnJSON = JSON.parse(this.responseText);
                CriarLinhaTabelaUsuario(objReturnJSON, "tabela-usuarios");
            } else {
                console.log("Requisição falhou: " + this.status);
            }
        }
    };

    xmlhttp.open("POST", "http://localhost/3DAW/AV1DB/src/php/usuario/lstTodas.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}

// perguntas
function incluirPergunta() {
    let questao = document.getElementById("pergunta").value;
    let opA = document.getElementById("respA").value;
    let opB = document.getElementById("respB").value;
    let opC = document.getElementById("respC").value;
    let opD = document.getElementById("respD").value;

    let gabValue;
    let gabOp = document.getElementsByName("gab");

    for (let i = 0; i < gabOp.length; i++) {
        if (gabOp[i].checked) {
            gabValue = String.fromCharCode(65 + i);
            break;
        }
    }    

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou a resposta OK: " + this.responseText);
        } else
        if (this.readyState < 4) {
            console.log("3: " + this.readyState);
        } else
            console.log("Requisicao falhou: " + this.status);
    }

    xmlhttp.open("POST", "http://localhost/3DAW/AV1DB/src/php/pergunta/incluir.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("questao=" + questao + "&opA=" + opA + "&opB=" + opB + "&opC=" + opC + "&opD=" + opD + "&gabValue=" + gabValue);
}

function alterarPergunta() {
    let id = document.getElementById("numPerg").value;
    let questao = document.getElementById("perguntaAlt").value;
    let opA = document.getElementById("respAAlt").value;
    let opB = document.getElementById("respBAlt").value;
    let opC = document.getElementById("respCAlt").value;
    let opD = document.getElementById("respDAlt").value;

    let gabValue;
    let gabOp = document.getElementsByName("gabAlt");

    for (let i = 0; i < gabOp.length; i++) {
        if (gabOp[i].checked) {
            gabValue = String.fromCharCode(65 + i);
            break;
        }
    }

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou a resposta OK: " + this.responseText);
        } else
        if (this.readyState < 4) {
            console.log("3: " + this.readyState);
        } else
            console.log("Requisicao falhou: " + this.status);
    }

    xmlhttp.open("POST", "http://localhost/3DAW/AV1DB/src/php/pergunta/alterar.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + id + "&questao=" + questao + "&opA=" + opA + "&opB=" + opB + "&opC=" + opC + "&opD=" + opD + "&gabValue=" + gabValue);
}

function excluirPergunta() {
    let id = document.getElementById("numExcluir").value;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log("Chegou a resposta OK: " + this.responseText);
        } else
        if (this.readyState < 4) {
            console.log("3: " + this.readyState);
        } else
            console.log("Requisicao falhou: " + this.status);
    }

    xmlhttp.open("POST", "http://localhost/3DAW/AV1DB/src/php/pergunta/excluir.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + id);
}

function lisUmaPergunta() {
    let id = document.getElementById("numListar").value;

    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                document.getElementById("tabela-pergunta").innerHTML = "";
                const objReturnJSON = JSON.parse(this.responseText);
                CriarLinhaTabelaPergunta(objReturnJSON, "tabela-pergunta");
            } else {
                console.log("Requisição falhou: " + this.status);
            }
        }
    };

    xmlhttp.open("POST", "http://localhost/3DAW/AV1DB/src/php/pergunta/lstUm.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("id=" + id);
}

function lisTodasPergunta() {
    let xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4) {
            if (this.status === 200) {
                document.getElementById("tabela-perguntas").innerHTML = "";
                const objReturnJSON = JSON.parse(this.responseText);
                CriarLinhaTabelaPergunta(objReturnJSON, "tabela-perguntas");
            } else {
                console.log("Requisição falhou: " + this.status);
            }
        }
    };

    xmlhttp.open("POST", "http://localhost/3DAW/AV1DB/src/php/pergunta/lstTodas.php");
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send();
}

function menuTest (type) {
    displayReset();
    document.getElementById(type).style.display = "block";        
}

function displayReset() {
    for (var i = 1; i <= 10; i++) {
        var element = document.getElementById(i.toString());
        if (element) {
            element.style.display = 'none'; 
        }   
    }
}

function CriarLinhaTabelaUsuario(data, tableId) {
    const table = document.getElementById(tableId);

    if (Array.isArray(data)) {
        data.forEach(usuario => {
            const tr = document.createElement("tr");

            const tdId = document.createElement("td");
            tdId.textContent = usuario.id;
            tr.appendChild(tdId);

            const tdNome = document.createElement("td");
            tdNome.textContent = usuario.nome;
            tr.appendChild(tdNome);

            const tdEmail = document.createElement("td");
            tdEmail.textContent = usuario.email;
            tr.appendChild(tdEmail);

            table.appendChild(tr);
        });
    } else {
        const tr = document.createElement("tr");

        const tdId = document.createElement("td");
        tdId.textContent = data.id;
        tr.appendChild(tdId);

        const tdNome = document.createElement("td");
        tdNome.textContent = data.nome;
        tr.appendChild(tdNome);

        const tdEmail = document.createElement("td");
        tdEmail.textContent = data.email;
        tr.appendChild(tdEmail);

        table.appendChild(tr);
    }
}

function CriarLinhaTabelaPergunta(data, tableId) {
    const table = document.getElementById(tableId);

    if (Array.isArray(data)) {
        data.forEach(pergunta => {
            const tr = document.createElement("tr");

            const tdId = document.createElement("td");
            tdId.textContent = pergunta.id;
            tr.appendChild(tdId);

            const tdQuestao = document.createElement("td");
            tdQuestao.textContent = pergunta.questao;
            tr.appendChild(tdQuestao);

            const tdOpA = document.createElement("td");
            tdOpA.textContent = pergunta.opA;
            tr.appendChild(tdOpA);
            
            const tdOpB = document.createElement("td");
            tdOpB.textContent = pergunta.opB;
            tr.appendChild(tdOpB);
            
            const tdOpC = document.createElement("td");
            tdOpC.textContent = pergunta.opC;
            tr.appendChild(tdOpC);
            
            const tdOpD = document.createElement("td");
            tdOpD.textContent = pergunta.opD;
            tr.appendChild(tdOpD);
            
            const tdGabarito = document.createElement("td");
            tdGabarito.textContent = pergunta.gabarito;
            tr.appendChild(tdGabarito);

            table.appendChild(tr);
        });
    } else {
        const tr = document.createElement("tr");

            const tdId = document.createElement("td");
            tdId.textContent = data.id;
            tr.appendChild(tdId);

            const tdQuestao = document.createElement("td");
            tdQuestao.textContent = data.questao;
            tr.appendChild(tdQuestao);

            const tdOpA = document.createElement("td");
            tdOpA.textContent = data.opA;
            tr.appendChild(tdOpA);
            
            const tdOpB = document.createElement("td");
            tdOpB.textContent = data.opB;
            tr.appendChild(tdOpB);
            
            const tdOpC = document.createElement("td");
            tdOpC.textContent = data.opC;
            tr.appendChild(tdOpC);
            
            const tdOpD = document.createElement("td");
            tdOpD.textContent = data.opD;
            tr.appendChild(tdOpD);
            
            const tdGabarito = document.createElement("td");
            tdGabarito.textContent = data.gabarito;
            tr.appendChild(tdGabarito);

            table.appendChild(tr);

        table.appendChild(tr);
    }
}